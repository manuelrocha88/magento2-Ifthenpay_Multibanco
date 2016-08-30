Ifthenpay Multibanco payment gateway extension for Magento2
===========================================================
![Multibanco](https://raw.githubusercontent.com/manuelrocha88/magento2-Ifthenpay_Multibanco/master/logomb.jpg) ![Ifthenpay](https://raw.githubusercontent.com/manuelrocha88/magento2-Ifthenpay_Multibanco/master/itplogo.png)

[![Latest Stable Version](https://poser.pugx.org/ifthenpay/multibanco-magento/v/stable)](https://packagist.org/packages/ifthenpay/multibanco-magento) [![Total Downloads](https://poser.pugx.org/ifthenpay/multibanco-magento/downloads)](https://packagist.org/packages/ifthenpay/multibanco-magento) [![License](https://poser.pugx.org/ifthenpay/multibanco-magento/license)](https://packagist.org/packages/ifthenpay/multibanco-magento)

This is the official module of Ifthenpay Multibanco Payment Gateway for Magento 2.

The IFTHENPAY is a Payment Institution authorized by the Bank of Portugal, the market leader in online payments by ATM references.

The IFTHENPAY also offers an APP for Android, iOS and Windows Phone that allows you full control of your payments.

For more information visit us at http://www.ifthenpay.com.

Install using Composer
======================

1. Go to Magento2 root folder

2. Enter following commands to install module:

    ```bash
    composer require ifthenpay/multibanco-magento
    ```
   Wait while dependencies are updated.

3. Enter following commands to enable module:

    ```bash
    php bin/magento module:enable Ifthenpay_Multibanco --clear-static-content
    php bin/magento setup:upgrade
    ```
4. Enable and configure Ifthenpay Multibanco in Magento Admin under **Stores/Configuration/Payment Methods/Ifthenpay Multibanco**

Install using File Upload
=========================

1. Download the file that contain the last version of the module

2. At Magento 2 root folder go to the **app** folder and create the structure **code/Ifthenpay/Multibanco**

3. Put the content of the ZIP file inside the folder **Multibanco** created at step 2

4. After that go to your **Magento 2 Administration**, click **System** option and then **Web Setup Wizard**

5. On the new page click the **Component Manager** button and search for the component with name **ifthenpay/multibanco-magento** and **Enable* it at the action column

6. Enable and configure Ifthenpay Multibanco in Magento Admin under **Stores/Configuration/Payment Methods/Ifthenpay Multibanco**

Support
=======

Have some problem with this module?

Do you have some kind of a problem with your Magento installation?

Do you need some special plugin?

Send me an email and ask for help or a quote: manuelrocha@manuelrocha.biz

My Website: www.manuelrocha.biz

Found a bug?
============

Do you found a bug on my code? Help me to fix it:

* [Open an Issue](https://github.com/manuelrocha88/magento2-Ifthenpay_Multibanco/issues/new) and describe where you found the bug/problem and/or explain how can I replicate the issue.

* Fork the project, fix it and make a request.
