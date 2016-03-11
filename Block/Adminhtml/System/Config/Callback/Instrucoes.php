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

/**
 * Renderer for Payments Advanced information
 */
namespace Ifthenpay\Multibanco\Block\Adminhtml\System\Config\Callback;

use Magento\Framework\ObjectManagerInterface;

class Instrucoes extends \Magento\Config\Block\System\Config\Form\Field
{
    /**
     * Template path
     *
     * @var string
     */
    protected $_template = 'system/config/callback/instrucoes.phtml';

    protected $_ifthenpayMbHelper;

        public function __construct(
            \Magento\Backend\Block\Template\Context $context,
            \Ifthenpay\Multibanco\Helper\Data $ifthenpayMbHelper,
            array $data = []
        ) {
            parent::__construct($context, $data);
            $this->_ifthenpayMbHelper = $ifthenpayMbHelper;
        }

    /**
     * Render fieldset html
     *
     * @param \Magento\Framework\Data\Form\Element\AbstractElement $element
     * @return string
     */
    public function render(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        $columns = $this->getRequest()->getParam('website') || $this->getRequest()->getParam('store') ? 5 : 4;
        return $this->_decorateRowHtml($element, "<td colspan='{$columns}'>" . $this->toHtml() . '</td>');
    }

    public function getEntidade(){
      return $this->_ifthenpayMbHelper->getEntidade();
    }

    public function getSubentidade(){
      return $this->_ifthenpayMbHelper->getSubentidade();
    }

    public function getUrlCallback(){
      return $this->_storeManager->getStore()->getBaseUrl()."ifthenpay/Callback/Check/k/[CHAVE_ANTI_PHISHING]/e/[ENTIDADE]/r/[REFERENCIA]/v/[VALOR]";
    }

    public function getAntiPhishingKey(){
      return $this->_ifthenpayMbHelper->getAntiPhishing();
    }
}
?>
