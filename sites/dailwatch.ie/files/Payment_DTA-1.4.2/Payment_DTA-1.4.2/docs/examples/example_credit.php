<?php

/**
 * Payment_DTA example:
 * Example of creating a DTA credit file with one transaction.
 *
 * PHP version 4 and 5
 *
 * Copyright (c) 2003-2005 Hermann Stainer, Web-Gear
 * http://www.web-gear.com/
 * All rights reserved.
 *
 * @category  Payment
 * @package   Payment_DTA
 * @author    Hermann Stainer <hs@web-gear.com>
 * @copyright 2003-2005 Hermann Stainer, Web-Gear
 * @license   http://www.debian.org/misc/bsd.license  BSD License (3 Clause)
 * @version   SVN: $Id: example_credit.php 300643 2010-06-22 00:21:19Z mschuett $
 * @link      http://pear.php.net/package/Payment_DTA
 */

require_once "Payment/DTA.php";


/**
* Initialize new DTA file.
* In this example the file contains credits.
* This means that in an exchange the sender is the person who pays money
* to the receiver.
*/

$dta_file = new DTA(DTA_CREDIT);

/**
* Set file sender. This is also the default sender for transactions.
*/

$dta_file->setAccountFileSender(
    array(
        "name"           => "Michael Mustermann",
        "bank_code"      => 11112222,
        "account_number" => 654321
    )
);

/**
* Add transaction.
*/

$dta_file->addExchange(
    array(
        "name"           => "Franz Mueller",    // Name of account owner.
        "bank_code"      => 33334444,           // Bank code.
        "account_number" => 13579000,           // Account number.
    ),
    12.01,                                      // Amount of money.
    array(                                      // Description of the transaction ("Verwendungszweck").
        "Credit Nr. 01234",
        "Information"
    )
);

/**
* Output DTA-File.
*/

echo $dta_file->getFileContent();

/**
* Write DTA-File.
*/

// $dta_file->saveFile("DTAUS0");

?>