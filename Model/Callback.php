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

class Callback extends \Magento\Framework\Model\AbstractModel
{
    public function _construct() {
        $this->_init('Ifthenpay\Multibanco\Model\Resource\Callback');
      }
}

?>
