<?php

/*
 * Copyright (C) 2007
 * Licensed to CiviCRM under the Academic Free License version 3.0.
 *
 * Written and contributed by 
 *
 */

/**
 *
 * @package CRM
 * @author Lars Schröter
 * $Id:$
 */


require_once 'CRM/Core/Payment.php';

class CRM_Core_Payment_DrupalDirectDebit extends CRM_Core_Payment {
    // const
    //     CHARSET = 'iso-8859-1';
    // 
    // static protected $_mode = null;
    // 
    // static protected $_params = array();
    
    /**
     * We only need one instance of this object. So we use the singleton
     * pattern and cache the instance in this variable
     *
     * @var object
     * @static
     */
    static private $_singleton = null;
    
    /**
     * Constructor
     *
     * @param string $mode the mode of operation: live or test
     *
     * @return void
     */
    function __construct( $mode, &$paymentProcessor ) {
        $this->_mode = $mode;
        $this->_paymentProcessor = $paymentProcessor;
        $config =& CRM_Core_Config::singleton( ); // get merchant data from config

        // check currency
        $currencyID = $config->defaultCurrency;

        if ('EUR' != $currencyID) {
          return self::error('Invalid configuration:'.$currencyID.', you must use currency EUR with DrupalDirectDebit'); // Configuration error: default currency must be EUR
        }
    }
    
    /** 
     * singleton function used to manage this object 
     * 
     * @param string $mode the mode of operation: live or test
     *
     * @return object 
     * @static 
     * 
     */ 
    static function &singleton( $mode, &$paymentProcessor ) {
        $processorName = $paymentProcessor['name'];
        if (self::$_singleton[$processorName] === null ) {
            self::$_singleton[$processorName] = new CRM_Core_Payment_DrupalDirectDebit( $mode, $paymentProcessor );
        }
        return self::$_singleton[$processorName];
    }
    
    /**
     * Submit a payment using Advanced Integration Method
     *
     * @param  array $params assoc array of input parameters for this transaction
     * @return array the result in a nice formatted array (or an error object)
     * @public
     */
    function doDirectPayment ( &$params ) {
        if (true == $params['is_pledge']) {       
           return self::error( ts( 'DrupalDirectDebit - recurring payments not implemented' ) );
        }
        
        // approach for recurring payments ... see AuthorizeNet.php
        // if ( $params['is_recur'] && $params['contributionRecurID'] ) {
        //   return $this->doRecurPayment( $params );
        // }
        
        if ('EUR' != $params['currencyID']) {
           return self::error(ts('Invalid currency selected. Only EUR where supported.'));
        }
        
        // CRM_Core_Error::debug('params', $params);
        
        $args = array( );

        $args['payment_action']             = $params['payment_action'];
        $args['amount']                     = $params['amount'];
        $args['contribution_type']          = $params['contributionType_name'];
        $args['contribution_page_id']       = $params['contributionPageID'];
        $args['contribution_description']   = $params['description'];
        $args['currency_id']                = $params['currencyID'];    // XXX
        $args['invoice_id']                 = $params['invoiceID'];     // hex number. hash?
        $args['ip_address']                 = $params['ip_address'];
        $args['first_name']                 = $params['first_name'];    // = billing_first_name
        $args['last_name']                  = $params['last_name'];     // = billing_last_name
        $args['email']                      = $params['email'];
        $args['street']                     = $params['street_address'];
        $args['city']                       = $params['city'];
        $args['state_province']             = $params['state_province'];      
        $args['country']                    = $params['country'];
        $args['postal_code']                = $params['postal_code'];
        $args['form_id']                    = $params['qfKey'];
        $args['bank_account_number']        = $params['bank_account_number'];
        $args['bank_identification_number'] = $params['bank_identification_number'];
        $args['bank_name']                  = $params['bank_name'];
        $args['account_holder']             = $params['account_holder'];
        $args['organization_name']          = $params['organization_name'];
        
        if (!empty($args['contribution_description'])) {
          $args['contribution_description'] = trim(str_replace(ts('Online Contribution:'), '', $args['contribution_description']));
        }
    
        if (!function_exists('direct_debit_pp_do_payment')) {            
            // I'm not sure about civiCRM error codes
            return self::error('Error: 0001' , ts("We are not able to proceed this contribution. Please send us a message with the given error code to resolve this problem."));
        }
        // CRM_Core_Error::debug('params', $params);
        $result = direct_debit_pp_do_payment($args, $this->_mode);
                
            if (isset($result['error'])) {
                // one single error
                if (isset($result['error']['code'])) {
                    return $this->directDebitError($result['error']['code']);
                }
    
                // array of one or more errors
                $e =& CRM_Core_Error::singleton( );
                foreach ($result['error'] as $key => $value) {
                    if (isset($result['error'][$key]['code'])) {
                        $e = self::drupalDirectDebitError($result['error'][$key]['code'], $key);
                    }
                }
                return $e;
            }
  
        $params['trxn_id'] = $result['trxn_id'];
        
        $params['gross_amount'] = $result['gross_amount'];
        $params['trxn_result_code'] =$result['trxn_result_code'];
        
        // set contribution status to pending
        $params['contribution_status_pending'] = true;
        
        return $params;
    }
    
    function &error ( $errorCode = null, $errorMessage = null ) {
        $e =& CRM_Core_Error::singleton( );
        if ( $errorCode ) {
            $e->push( $errorCode, 0, null, $errorMessage );
        }
        else {
            $e->push( 9001, 0, null, 'Unknown System Error.' );
        }
        return $e;
    }
    
    function drupalDirectDebitError($code, $key = NULL) {
        $message = '';
        $fields = self::getDrupalDirectDebitFields();
        if ('invalid data' == $code) {
            if ('form_field' == $fields[$key]['type']) {
                $message = ts('Data in field %1 is not valid.', array(1 => $fields[$key]['name']));
            } else {
                $message = ts('We are not able to proceed this contribution. Please contact to resolve this problem.');
            }
        } else if ('data exists' == $code) {
            $message = ts('It appears that this transaction is a duplicate. Therefore have refused the second submission. For any doubts leave us a message.');
        } else if ('failed to insert data' == $code) {
            $message = ts('There occurred an error while proceeding your transaction. Your payment transaction was not executed. Please try again later. If you continue to have problems please contact us.');
        } else if ('field required' == $code) {
            $message = ts('%1 is a required field.', array(1 => $fields[$key]['name']));
        } else {
            $message = ts('There occurred an unexpected error while proceeding your transaction. Please contact to resolve this problem.');    
        }
        return self::error($code , $message );
    }
    
    /**
     * This function checks to see if we have the right config values 
     *
     * @return string the error message if any
     * @public
     */
    function checkConfig( ) {
        return null;
    }
    
    function getDrupalDirectDebitFields( ) {
        $fields = array(
            'payment_action'            => array('name' => ts('Payment Action'),              'type' => 'other'),
            'amount'                    => array('name' => ts('Amount'),                      'type' => 'form_field'),
            'bank_account_number'       => array('name' => ts('Bank Account Number'),         'type' => 'form_field'),
            'bank_identification_number'=> array('name' => ts('Bank Identification Number'),  'type' => 'form_field'),
            'bank_name'                 => array('name' => ts('Bank Name'),                   'type' => 'form_field'),
            'account_holder'            => array('name' => ts('Account Holder'),              'type' => 'form_field'),
            'organization_name'         => array('name' => ts('Organization Name'),           'type' => 'form_field'),
            'contribution_type'         => array('name' => ts('Contribution Type'),           'type' => 'other'),
            'contribution_page_id'      => array('name' => ts('Contribution Page Identifier'),'type' => 'other'),
            'contribution_description'  => array('name' => ts('Contribution Description'),    'type' => 'other'),
            'currency_id'               => array('name' => ts('Currency'),                    'type' => 'form_field'),
            'invoice_id'                => array('name' => ts('Invoice Identifier'),          'type' => 'other'),
            'ip_address'                => array('name' => ts('IP Address'),                  'type' => 'other'),
            'first_name'                => array('name' => ts('Billing First Name'),          'type' => 'form_field'),
            'last_name'                 => array('name' => ts('Billing Last Name'),           'type' => 'form_field'),
            'email'                     => array('name' => ts('E-Mail'),                      'type' => 'form_field'),
            'street'                    => array('name' => ts('Street Address'),              'type' => 'form_field'),
            'city'                      => array('name' => ts('City'),                        'type' => 'form_field'),
            'state_province'            => array('name' => ts('State/Province'),              'type' => 'form_field'),
            'country'                   => array('name' => ts('Country'),                     'type' => 'form_field'),
            'postal_code'               => array('name' => ts('Postal Code'),                 'type' => 'form_field'),
            'form_id'                   => array('name' => ts('Form Identifier'),             'type' => 'other'),
            'billing'                   => array('name' => ts('No receipt'),                  'type' => 'form_field'),
          );
        return $fields;
    }

        
    function changeContributionState($params) {

        if (empty($params['contribution_status_id']) || empty($params['invoice_id'])) {
            // todo: errormessage?
            return FALSE;
        }
        
        $input = $objects = array( );
        
        // todo: not sure what to with this objects
        $objects['membership']        = null;
        $objects['event']             = null;
        $objects['participant']       = null;
        
        // component: contribute ... maybe later event
        $input['component'] = empty($params['component'])? 'contribute' : $params['component'];
                
        $input['trxn_type']       = (empty($params['trxn_type'])? 'Debit' : $params['trxn_type']);
        $input['invoice_id']       = $params['invoice_id'];

        
        $input['trxn_id']       = $params['trxn_id'];
        $contribution_status_id = $params['contribution_status_id'];

        // make sure contribution exists and is valid
        require_once 'CRM/Contribute/DAO/Contribution.php';
        $contribution =& new CRM_Contribute_DAO_Contribution( );
        $contribution->invoice_id = $input['invoice_id'];
        if ( ! $contribution->find( true ) ) {
            CRM_Core_Error::debug_log_message( "Could not find contribution record: $contributionID" );
            return FALSE;
        }

        // load the data to the $contribution object
        $contribution->get('invoice_id', $input['invoice_id']);
        // set date to Mysql format, otherwise we will lose the date
        $contribution->receive_date  = (empty($contribution->receive_date) ? NULL : CRM_Utils_Date::isoToMysql($contribution->receive_date)); 
        $contribution->receipt_date  = (empty($contribution->receipt_date) ? NULL : CRM_Utils_Date::isoToMysql($contribution->receipt_date));
        $contribution->cancel_date   = (empty($contribution->cancel_date) ? NULL : CRM_Utils_Date::isoToMysql($contribution->cancel_date));
        $contribution->thankyou_date = (empty($contribution->thankyou_date) ? NULL : CRM_Utils_Date::isoToMysql($contribution->thankyou_date));
                
        if (empty($contribution->id)) {
            return FALSE;
        }

        $objects['contribution'] =& $contribution;
        
        // get payment processor
        require_once 'CRM/Contribute/DAO/ContributionPage.php';
        $contributionPage =& new CRM_Contribute_DAO_ContributionPage();
        $contributionPage->id = $contribution->contribution_page_id;
        $contributionPage->get('invoice_id', $input['invoice_id']);
        
        $mode = $contribution->is_test ? 'test' : 'live';
        
        require_once 'CRM/Core/BAO/PaymentProcessor.php';
        $paymentProcessor =& CRM_Core_BAO_PaymentProcessor::getPayment( $contributionPage->payment_processor_id, $mode );

        $objects['paymentProcessor']   =& $paymentProcessor;
        
        require_once 'CRM/Core/Transaction.php';
        $transaction = new CRM_Core_Transaction( );

        $result = FALSE;
        switch ($params['contribution_status_id']) {
            case 1: // completed
                $input['fee_amount']    = (empty($params['fee_amount'])? '' : $params['fee_amount']);
                $input['net_amount']    = (empty($params['net_amount'])? '' : $params['net_amount']);
                $input['receipt_date']  = (empty($params['receipt_date'])? date('YmdHis') : date('YmdHis', $params['receipt_date']));
                $result = self::completeTransaction($objects, $transaction, $input);
                break;
            case 3: // canceled
                $input['reasonCode'] = (empty($params['reasonCode'])? '' : $params['reasonCode']);
                $input['cancel_date'] = (empty($params['cancel_date'])? date( 'YmdHis' ) : date('YmdHis', $params['cancel_date']));
                $result = self::canceled( $objects, $transaction, $input );
                break;
            case 4: // failed
                $result = self::failed( $objects, $transaction );
                break;
            case 5: // in_progress
                $result = self::in_progress( $objects, $transaction );
                break;
            default:
                // todo: errormessage? (unsupported contribution status)
                $result = FALSE;
        }
        return $result;   
    }
    
    
    
    function completeTransaction(&$objects, &$transaction, &$input) {
        $contribution =& $objects['contribution'];
        
        $contribution->trxn_id                = $input['trxn_id'];
        $contribution->contribution_status_id = 1;
        $contribution->payment_instrument_id  = 5;
        $contribution->fee_amount             = $input['fee_amount'];
        $contribution->net_amount             = $input['net_amount'];
        $contribution->receipt_date           = CRM_Utils_Date::isoToMysql($input['receipt_date']);
        $contribution->total_amount           = $input['net_amount'] - $input['fee_amount'];
        $contribution->cancel_date            = NULL;
        $contribution->cancel_reason          = NULL;

        $contribution->save();

                
        // next create the transaction record
        $trxnParams = array(
            'contribution_id'   => $contribution->id,
            'trxn_date'         => date('YmdHis'), // now
            'trxn_type'         => $input['trxn_type'],
            'total_amount'      => $contribution->total_amount,
            'fee_amount'        => $contribution->fee_amount,
            'net_amount'        => $contribution->net_amount,
            'currency'          => $contribution->currency,
            'payment_processor' => $objects['paymentProcessor'],
            'trxn_id'           => $contribution->trxn_id,
        );
        
        require_once 'CRM/Core/BAO/FinancialTrxn.php';
        $trxn =& CRM_Core_BAO_FinancialTrxn::create( $trxnParams );

        // create an activity record
        require_once 'CRM/Activity/BAO/Activity.php';
        CRM_Activity_BAO_Activity::addActivity( $contribution );

        // todo: membership? 
        
        
        $transaction->commit(); 
        return TRUE;
    }
    
    function failed( &$objects, &$transaction ) {
        $contribution =& $objects['contribution'];
        $membership   =& $objects['membership']  ;
        $participant  =& $objects['participant'] ;

        $contribution->contribution_status_id = 4;
        $contribution->receipt_date = NULL;
        $contribution->save( );

        if ( $membership ) {
            $membership->status_id = 4;
            $membership->save( );
            
            //update related Memberships.
            require_once 'CRM/Member/BAO/Membership.php';
            $params = array( 'status_id' => 4 );
            CRM_Member_BAO_Membership::updateRelatedMemberships( $membership->id, $params );
        }

        if ( $participant ) {
            $participant->status_id = 4;
            $participant->save( );
        }
            
        $transaction->commit( );
        CRM_Core_Error::debug_log_message( "Setting contribution status to failed" );
        return true;
    }

    function canceled( &$objects, &$transaction, &$input ) {
        $contribution =& $objects['contribution'];
        $membership   =& $objects['membership']  ;
        $participant  =& $objects['participant'] ;

        $contribution->contribution_status_id = 3;
        $contribution->cancel_date = date( 'YmdHis' ); //now
        $contribution->cancel_reason = $input['reasonCode'];
        $contribution->save();

        if ( $membership ) {
            $membership->status_id = 6;
            $membership->save( );
            
            //update related Memberships.
            require_once 'CRM/Member/BAO/Membership.php';
            $params = array( 'status_id' => 6 );
            CRM_Member_BAO_Membership::updateRelatedMemberships( $membership->id, $params );
        }
        
        if ( $participant ) {
            $participant->status_id = 4;
            $participant->save( );
        }

        $transaction->commit( );
        CRM_Core_Error::debug_log_message( "Setting contribution status to canceled" );
        return true;
    }
    
    function in_progress( &$objects, &$transaction) {
        $contribution =& $objects['contribution'];
        $membership   =& $objects['membership']  ;
        $participant  =& $objects['participant'] ;

        $contribution->contribution_status_id = 5; // In Progress
        $contribution->cancel_date = NULL;
        $contribution->cancel_reason = NULL;
        
        $contribution->save();

        $transaction->commit( );
        CRM_Core_Error::debug_log_message( "Setting contribution status to in_progress" );
        return true;
    }
}