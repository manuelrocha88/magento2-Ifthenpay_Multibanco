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
        \Magento\Sales\Api\Data\OrderInterface $order,
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
        $id = $this->getOrderAdmin()->getIncrementId();

        if($id == null){
            $order  = $this->getOrderAdmin()->getOrder();
            $id = $order->getDataByKey("increment_id");
        }

        $valor = $this->getOrderAdmin()->getGrandTotal();

        if($valor == null){
            $order  = $this->getOrderAdmin()->getOrder();
            $valor = $order->getDataByKey("grand_total");
        }

        return $this->_genRef->GenerateMbRef(
            $this->_ifthenpayMbHelper->getEntidade(),
            $this->_ifthenpayMbHelper->getSubentidade(),
            $id,
            $valor,
            $comEspacos
        );
    }

    public function getValorAdmin()
    {
        $valor = $this->getOrderAdmin()->getGrandTotal();

        if($valor == null){
            $order  = $this->getOrderAdmin()->getOrder();
            $valor = $order->getDataByKey("grand_total");
        }

        return number_format($valor, 2);
    }

    public function getReferenciaFront($comEspacos = false)
    {

        return $this->_genRef->GenerateMbRef(
            $this->_ifthenpayMbHelper->getEntidade(),
            $this->_ifthenpayMbHelper->getSubentidade(),
            $this->getInfo()->getOrder()->getData('increment_id'),
            $this->getInfo()->getOrder()->getData('grand_total'),
            $comEspacos
        );
    }

    public function getValorFront()
    {
        return $this->getOrderFront()->formatPrice($this->getTotalFront());
    }

    public function getOrderAdmin()
    {
         return 
         ($this->coreRegistry->registry('current_order')) != null
          ? ($this->coreRegistry->registry('current_order'))
          : (
              ($this->coreRegistry->registry('current_invoice')) != null
              ? ($this->coreRegistry->registry('current_invoice'))
              : (
                  ($this->coreRegistry->registry('current_shipment')) != null
                  ? ($this->coreRegistry->registry('current_shipment'))
                  : ($this->coreRegistry->registry('current_creditmemo'))
                )
            );
    }

    public function getOrderFront()
    {
        return $this->_data['info'];
    }

    public function getOrderIdFront()
    {
        return $this->getOrderFront()->getData('entity_id');
    }

    public function getTotalFront()
    {
        return $this->getOrderFront()->getData('amount_ordered');
    }
}
