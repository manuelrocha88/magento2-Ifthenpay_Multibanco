<?php

/**
* Ifthenpay_Multibanco module dependency
*
* @category    Ifthenpay
* @package     Ifthenpay_Multibanco
* @author      Manuel Rocha
* @copyright   Ifthenpay (http://www.ifthenpay.com)
* @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*/

\Magento\Framework\Component\ComponentRegistrar::register(
    \Magento\Framework\Component\ComponentRegistrar::MODULE,
    'Ifthenpay_Multibanco',
    __DIR__
);
