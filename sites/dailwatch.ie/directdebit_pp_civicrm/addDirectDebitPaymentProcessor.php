<?php
/**
 * Sets up civicrm for the Drupal Direct Debit payment processor. This script is written
 * to run from the command line (hence \n rather then <br> in the echos).
 * 
 * run from civicrm root directory
 *   
 * 1. adds Drupal Direct Debit payment processor details to civicrm_payment_processor_type
 *  
 * 2. adds a new table to civicrm for recording futurepay payment ids so the
 *    IPN can be identified and processed by civicrm.
 * 
 * !! Do not leave this script on the server !!
 *
 * This set up was inspired by some work of Dougall Winship
 */ 

$lineBreak = empty($_SERVER['HTTP_HOST'])? "\n" : "<br />";

// Pull in the settings file & Instantiate the config so that the DB connection will fire up
require_once './settings_location.php';
require_once '../civicrm.settings.php';
require_once $civicrm_root.'/civicrm.config.php';
require_once $civicrm_root.'/CRM/Core/Config.php';
$config  =& CRM_Core_Config::singleton( );

require_once $civicrm_root.'/CRM/Core/DAO.php';
 
// check if the field for handling debit exists in table civicrm_payment_processor_type
$query = "SELECT COLUMN_NAME, DATA_TYPE, IS_NULLABLE, COLUMN_DEFAULT
  FROM INFORMATION_SCHEMA.COLUMNS
  WHERE table_name = 'civicrm_payment_processor_type' AND COLUMN_NAME='payment_type'";
//  echo "mysql>$query\n";
$id = CRM_Core_DAO::singleValueQuery( $query, CRM_Core_DAO::$_nullArray );
if (!$id) {
  // need to alter table
  $query = "ALTER table civicrm_payment_processor_type add payment_type int(10) unsigned DEFAULT 1 COMMENT 'Type of payment?'";
  $dao = CRM_Core_DAO::executeQuery( $query, CRM_Core_DAO::$_nullArray );
  echo "\nmysql>$query\n";
  if ($dao) {
    echo "column payment_type in civicrm_payment_processor_type table created" . $lineBreak;
  } else {
    die("Could not alter table civicrm_payment_processor_type to create column payment_type" . $lineBreak);
  }
}

// check if the field for handling debit exists in table civicrm_payment_processor
$query = "SELECT COLUMN_NAME, DATA_TYPE, IS_NULLABLE, COLUMN_DEFAULT
  FROM INFORMATION_SCHEMA.COLUMNS
  WHERE table_name = 'civicrm_payment_processor' AND COLUMN_NAME='payment_type'";
$id = CRM_Core_DAO::singleValueQuery( $query, CRM_Core_DAO::$_nullArray );
if (!$id) {
  // need to alter table
  $query = "ALTER table civicrm_payment_processor add payment_type int(10) unsigned DEFAULT 1 COMMENT 'Type of payment?'";
  $dao = CRM_Core_DAO::executeQuery( $query, CRM_Core_DAO::$_nullArray );
  echo "\nmysql>$query" . $lineBreak;
  if ($dao) {
    echo "column payment_type in civicrm_payment_processor table created" . $lineBreak;
  } else {
    die("Could not alter table civicrm_payment_processor to create column payment_type" . $lineBreak);
  }
}


$query = "SELECT id FROM civicrm_payment_processor_type
         WHERE name='DrupalDirectDebit'";
// echo "mysql>$query" . $lineBreak;
$id = CRM_Core_DAO::singleValueQuery( $query, CRM_Core_DAO::$_nullArray );
if ($id) {
  die("Drupal_Direct_Debit payment processor already exists in the CiviCRM database" . $lineBreak);
}

// For Billing Modes see /CRM/Core/Payment.php
//   BILLING_MODE_FORM   = 1 - form
//   BILLING_MODE_BUTTON = 2 - button
//                         3 - paypal specific 
//   BILLING_MODE_NOTIFY = 4 - transfer checkout

$civicrmUFBaseURL = str_replace(array('http://', 'https://'), '', CIVICRM_UF_BASEURL);

 $setFields = array (
//'domain_id' => 1, //.. seems not to be used anymore
'name' => 'DrupalDirectDebit',
'title' => 'Drupal Direct Debit',
//'description' => null,
'is_active' => 1,
'is_default' => 0,
'user_name_label' => 'User Name',
// 'password_label' => 'Password',
// 'signature_label' => 'Signature',
// 'subject_label' => 'Subject',
'class_name' => 'Payment_DrupalDirectDebit',
'url_site_default' => 'https://'. $civicrmUFBaseURL,
// 'url_api_default' => null,
// 'url_recur_default' => 'https://'. $civicrmUFBaseURL,
// 'url_button_default' => null,
'url_site_test_default' => 'https://'. $civicrmUFBaseURL,
// 'url_api_test_default' => null,
// 'url_recur_test_default' => 'https://'. $civicrmUFBaseURL,
// 'url_button_test_default' => null,
'billing_mode' => 1,
'is_recur' => 0,
'payment_type' => 2);

// this way doesn't handle nulls properly so comment em out above instead...
$fieldNames = implode(",",array_keys($setFields));
$fieldValues = "'".implode("','",array_values($setFields))."'";
$query = "
INSERT INTO civicrm_payment_processor_type($fieldNames) VALUES($fieldValues)";

// echo "\nmysql>$query" . $lineBreak;
$dao = CRM_Core_DAO::executeQuery( $query, CRM_Core_DAO::$_nullArray );

if ($dao) {
  echo "Added Drupal Direct Debit processor type successfully to the CiviCRM database" . $lineBreak;
}
else {
  echo "Failed to add Drupal Direct Debit processor type to the CiviCRM database" . $lineBreak;
}
