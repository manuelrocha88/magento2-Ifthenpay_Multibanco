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

namespace Ifthenpay\Multibanco\Block\Info;

use Magento\Framework\Registry;

class Multibanco extends \Magento\Payment\Block\Info
{
    public $_quote;
    public $coreRegistry = null;
    public $_genRef = null;
    public $_ifthenpayMbHelper = null;
    public $_checkoutSession = null;
    public $_order = null;
    public $__data=null;

    /**
     * @var string
     */
    public $_template = 'Ifthenpay_Multibanco::info/multibanco.phtml';

    public $_logger;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Customer\Model\Session $customerSession
     * @param \Magento\Checkout\Model\Session $checkoutSession
     * @param array $data
     * @codeCoverageIgnore
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        Registry $registry,
        \Magento\Checkout\Model\Session $checkoutSession,
        \Ifthenpay\Multibanco\Helper\GerarReferencias $genRef,
        \Ifthenpay\Multibanco\Helper\Data $ifthenpayMbHelper,
        \Magento\Sales\Model\Order $order,
        array $data = []
    ) {
        $this->coreRegistry = $registry;
        $this->_genRef = $genRef;
        $this->_ifthenpayMbHelper = $ifthenpayMbHelper;
        $this->_checkoutSession = $checkoutSession;
        $this->_order = $order;
        $this->__data = $data;

        $this->_logger = $context->getLogger();

        parent::__construct($context, $data);
    }
    
    public function getEntidade()
    {
        return $this->_ifthenpayMbHelper->getEntidade();
    }

    public function getReferenciaAdmin($comEspacos = false)
    {
        return $this->_genRef->GenerateMbRef(
            $this->_ifthenpayMbHelper->getEntidade(),
            $this->_ifthenpayMbHelper->getSubentidade(),
            $this->getOrderAdmin()->getIncrementId(),
            $this->getOrderAdmin()->getGrandTotal(),
            $comEspacos
        );
    }

    public function getValorAdmin()
    {
        return $this->getOrderAdmin()->formatPrice($this->getOrderAdmin()->getGrandTotal());
    }

    public function getReferenciaFront($comEspacos = false)
    {
        return $this->_genRef->GenerateMbRef(
            $this->_ifthenpayMbHelper->getEntidade(),
            $this->_ifthenpayMbHelper->getSubentidade(),
            $this->getOrderIdFront(),
            $this->getTotalFront(),
            $comEspacos
        );
    }

    public function getValorFront()
    {
        return $this->getOrderFront()->formatPrice($this->getTotalFront());
    }

    public function getOrderAdmin()
    {
        return ($this->coreRegistry->registry('current_order'));
    }

    public function getOrderFront()
    {
        return $this->_data['info'];
    }

    public function getOrderIdFront()
    {
        return $this->getOrderFront()->getData('parent_id');
    }

    public function getTotalFront()
    {
        return $this->getOrderFront()->getData('amount_ordered');
    }
}
