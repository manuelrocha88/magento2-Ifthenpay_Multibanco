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

class Callback extends \Magento\Framework\Model\AbstractModel
{
    public function _construct()
    {
        $this->_init('Ifthenpay\Multibanco\Model\Resources\Callback');
    }
}
