<?php
/**
* Ifthenpay_Multibanco module dependency
*
* @category    Gateway Payment
* @package     Ifthenpay_Multibanco
* @author      Manuel Rocha
* @copyright   Manuel Rocha (http://www.manuelrocha.biz)
* @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*/

namespace Ifthenpay\Multibanco\Controller\Callback;

class Check extends \Magento\Framework\App\Action\Action
{
    public $_ifthenpayMbHelper;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Ifthenpay\Multibanco\Helper\Data $ifthenpayMbHelper
    ) {
        parent::__construct($context);
        $this->_ifthenpayMbHelper = $ifthenpayMbHelper;
    }

    public function execute()
    {
        $resultado = '-1';
        if (!$this->_ifthenpayMbHelper->checkIfAntiPhishingIsValid($this->getRequest()->getParam('k'))) {
            $resultado = '1000 - NOT OK';
        } else {
            $referencia = $this->getRequest()->getParam('r');
            $refid = (int)(substr($referencia, 3, 4));
            $valor = $this->getRequest()->getParam('v');

            $orderId = $this->_ifthenpayMbHelper->getOrderId($refid, $valor);

            if ($orderId != "" || $orderId != null) {
                $this->_ifthenpayMbHelper->setOrderAsPaid($orderId);
                $resultado = '1200 - OK';
            } else {
                $resultado = '1404 - NOT FOUND';
            }
        }

        $this->getResponse()->setBody($resultado);
    }
}
