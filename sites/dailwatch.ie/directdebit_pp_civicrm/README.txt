The Direct Debit Payment Processor enhances CiviCRM 3.3.x for 
german payment method ELV (http://de.wikipedia.org/wiki/Lastschrift). 

## Requirements

* CiviCRM 3.3.x (3.3.3 or above)
* Drupal 6.x
* Drupal module "direct_debit" (http://crmproject.de/node/22)

## Installation

1. Extract directdebit_pp_civicrm...tgz file (from http://crmproject.de/node/22) 
   to your Drupal site directory. By default this is sites/default/.
2. Change to the directory directdebit_pp_civicrm and run "sh install.sh"
3. Add the Payment Processor "Drupal Direct Debit" at the Drupal admin URL 
   civicrm/admin/paymentProcessor&reset=1. 
   Note: You must enter something into the Username and URL fields. It will not be 
   used though because this Payment Processor does not utilize network functions.

## Copyright

Webkonzepte und Programmierung Bernhard Fürst und
Lars Schröter <lars.schroeter@fuerstnet.de>
http://fuerstnet.de

## Lizenz

Das vorliegende Programmsystem unterliegt der GNU GENERAL PUBLIC LICENSE Version 2, June 1991. 
Siehe beigelegte Datei LICENSE.txt.

## Weitere Informationen

http://crmproject.de/node/19