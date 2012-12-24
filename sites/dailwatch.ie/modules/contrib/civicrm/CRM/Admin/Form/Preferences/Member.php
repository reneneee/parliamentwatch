<?php

/*
 +--------------------------------------------------------------------+
 | CiviCRM version 4.1                                                |
 +--------------------------------------------------------------------+
 | Copyright CiviCRM LLC (c) 2004-2011                                |
 +--------------------------------------------------------------------+
 | This file is a part of CiviCRM.                                    |
 |                                                                    |
 | CiviCRM is free software; you can copy, modify, and distribute it  |
 | under the terms of the GNU Affero General Public License           |
 | Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
 |                                                                    |
 | CiviCRM is distributed in the hope that it will be useful, but     |
 | WITHOUT ANY WARRANTY; without even the implied warranty of         |
 | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
 | See the GNU Affero General Public License for more details.        |
 |                                                                    |
 | You should have received a copy of the GNU Affero General Public   |
 | License and the CiviCRM Licensing Exception along                  |
 | with this program; if not, contact CiviCRM LLC                     |
 | at info[AT]civicrm[DOT]org. If you have questions about the        |
 | GNU Affero General Public License or the licensing of CiviCRM,     |
 | see the CiviCRM license FAQ at http://civicrm.org/licensing        |
 +--------------------------------------------------------------------+
*/

/**
 *
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2011
 * $Id: Display.php 36505 2011-10-03 14:19:56Z lobo $
 *
 */

require_once 'CRM/Admin/Form/Preferences.php';

/**
 * This class generates form components for component preferences
 * 
 */
class CRM_Admin_Form_Preferences_Member extends CRM_Admin_Form_Preferences
{
    function preProcess( ) {
        CRM_Utils_System::setTitle(ts('CiviMember Component Settings'));
        $this->_varNames = 
            array( CRM_Core_BAO_Setting::MEMBER_PREFERENCES_NAME =>
                   array( 
                         'default_renewal_contribution_page'  => array( 'html_type'    => 'select',
                                                                        'title'        => ts( 'Default online membership renewal page' ),
                                                                        'weight'       => 1,
                                                                        'description'  => ts( 'If you select a default online contribution page for self-service membership renewals, a "renew" link pointing to that page will be displayed on the Contact Dashboard for memberships which were entered offline. You will need to ensure that the membership block for the selected online contribution page includes any currently available memberships.'),
                                                                        ),
                          )
                   );

        parent::preProcess( );
    }
    
    
    /**
     * Function to build the form
     *
     * @return None
     * @access public
     */
    function buildQuickForm( )
    {
        require_once 'CRM/Contribute/PseudoConstant.php';
        
        $this->add('select', 'default_renewal_contribution_page', 
                    ts( 'Default Online Membership Renewal Page' ),
                    array( '' => ts( '- select -' ) ) +
                    CRM_Contribute_PseudoConstant::contributionPage( ) );
    
        parent::buildQuickForm( );
    }

}


