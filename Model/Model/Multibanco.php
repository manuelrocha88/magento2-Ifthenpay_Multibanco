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

namespace Ifthenpay\Multibanco\Model;

class Multibanco extends \Magento\Payment\Model\Method\AbstractMethod
{
    const PAYMENT_METHOD_MULTIBANCO_CODE = 'ifthenpay_multibanco';

  /**
   * Payment method code
   *
   * @var string
   */
    public $_code = self::PAYMENT_METHOD_MULTIBANCO_CODE;
    public $_formBlockType = 'Ifthenpay\Multibanco\Block\Form\Multibanco';
    public $_infoBlockType = 'Ifthenpay\Multibanco\Block\Info\Multibanco';
    public $_isOffline = true;

    public function getInstructions()
    {
        return trim($this->getConfigData('instructions'));
    }
}
