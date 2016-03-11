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

namespace Ifthenpay\Multibanco\Model;

class Multibanco extends \Magento\Payment\Model\Method\AbstractMethod
{


  const PAYMENT_METHOD_MULTIBANCO_CODE = 'ifthenpay_multibanco';

  /**
   * Payment method code
   *
   * @var string
   */
  protected $_code = self::PAYMENT_METHOD_MULTIBANCO_CODE;
  protected $_formBlockType = 'Ifthenpay\Multibanco\Block\Form\Multibanco';
  protected $_infoBlockType = 'Ifthenpay\Multibanco\Block\Info\Multibanco';
  protected $_isOffline = true;

  public function getInstructions()
  {
      return trim($this->getConfigData('instructions'));
  }



}
