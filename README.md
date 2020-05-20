“Skipdomvalidation” extension
=====================
This module will add the feature to skip the DOM validations in Magento 2.
This module is created to fix the below issue from Magento 2.2.X, 2.3.X:

* Magento 2.2.0 issues with layouts: https://github.com/magento/magento2/issues/11116

## CONTACTS
* Email: rajpatra220@gmail.com
* LinkedIn: https://www.linkedin.com/in/rajesh-patra/

## INSTALLATION
* extract files from an archive
* deploy files into Magento2 folder `app/code/Mageraj/Skipdomvalidation`

### ENABLE EXTENSION
* enable extension (use Magento 2 command line interface \*):
>`$> php bin/magento module:enable Mageraj_Skipdomvalidation`

* to make sure that the enabled module is properly registered, run 'setup:upgrade':
>`$> php bin/magento setup:upgrade`

* [if needed] re-compile code and re-deploy static view files:
>`$> php bin/magento setup:di:compile`
>`$> php bin/magento setup:static-content:deploy`


Enjoy!

Best regards,
Rajesh Patra