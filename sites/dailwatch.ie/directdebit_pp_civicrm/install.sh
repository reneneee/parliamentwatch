#!/bin/sh
# Install script for the Direct Debit payment processor for CiviCRM

# Check if we are at the correct location at DRUPAL/sites/default or similar
if [ ! -r ../civicrm.settings.php ]; then 
  echo "Could not find the civicrm.settings.php file. Please move this directory to your Drupal site directory like sites/default/ and run the install.sh from within this directory."
  exit
fi

civicrm_root=$(grep -E '^\$civicrm_root' ../civicrm.settings.php | cut -d\' -f2)
owner=$(stat -c %u ../civicrm.settings.php)
group=$(stat -c %g ../civicrm.settings.php)

# Copy files
for file in $(find CRM -type f)
do
  # Copy file
  cp -v $file $civicrm_root/$file
  # Change owner/group to that of ../civicrm.settings.php
  # Some shared hosting accounts don't want to run PHP skripts 
  # which ar enot owned by the account user
  chown -v $owner:$group $civicrm_root/$file
done

# Set up CiviCRM to use the payment processor
/usr/bin/env php -f addDirectDebitPaymentProcessor.php
