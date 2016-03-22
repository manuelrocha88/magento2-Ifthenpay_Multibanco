Ifthenpay Multibanco payment gateway extension for Magento2
===========================================================

This is the official module of Ifthenpay Multibanco Payment Gateway for Magento 2.

The IFTHENPAY is a Payment Institution authorized by the Bank of Portugal, the market leader in online payments by ATM references.

The IFTHENPAY also offers an APP for Android, iOS and Windows Phone that allows you full control of your payments.

For more information visit us at http://www.ifthenpay.com.

Install
=======

1. Go to Magento2 root folder

2. Enter following commands to install module:

    ```bash
    composer config repositories.ifthenpaymultibanco git https://github.com/manuelrocha88/magento2-Ifthenpay_Multibanco.git
    composer require ifthenpay/multibanco:1.0.0
    ```
   Wait while dependencies are updated.

3. Enter following commands to enable module:

    ```bash
    php bin/magento module:enable Ifthenpay_Multibanco --clear-static-content
    php bin/magento setup:upgrade
    ```
4. Enable and configure Ifthenpay Multibanco in Magento Admin under Stores/Configuration/Payment Methods/Ifthenpay Multibanco

Support
=======

Have some problem with this module?

Do you have some kind of a problem with your Magento installation?

Do you need some special plugin?

Send me an email and ask for help or a quote: manuelrocha@manuelrocha.biz
