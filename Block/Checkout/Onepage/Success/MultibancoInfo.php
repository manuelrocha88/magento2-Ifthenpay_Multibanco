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
namespace Ifthenpay\Multibanco\Block\Checkout\Onepage\Success;

/**
 * Billing agreement information on Order success page
 */
class MultibancoInfo extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Magento\Checkout\Model\Session
     */
    protected $_checkoutSession;


    protected $_genRef = null;
    protected $_ifthenpayMbHelper;

    /**
     * @var \Magento\Customer\Model\Session
     */
    protected $_customerSession;

    /**
     * @var \Magento\Paypal\Model\Billing\AgreementFactory
     */
    protected $_agreementFactory;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Checkout\Model\Session $checkoutSession
     * @param \Magento\Customer\Model\Session $customerSession
     * @param \Magento\Paypal\Model\Billing\AgreementFactory $agreementFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Paypal\Model\Billing\AgreementFactory $agreementFactory,
        \Ifthenpay\Multibanco\Helper\GerarReferencias $genRef,
        \Ifthenpay\Multibanco\Helper\Data $ifthenpayMbHelper,
        array $data = []
    ) {
        $this->_checkoutSession = $checkoutSession;
        $this->_customerSession = $customerSession;
        $this->_agreementFactory = $agreementFactory;

        $this->_genRef = $genRef;
        $this->_ifthenpayMbHelper = $ifthenpayMbHelper;

        parent::__construct($context, $data);
    }

    /**
     * Return billing agreement information
     *
     * @return string
     */
    protected function _toHtml()
    {
        return parent::_toHtml();
    }

    public function getEntidade(){
      return $this->_ifthenpayMbHelper->getEntidade();
    }

    public function getReferencia($comEspacos = false)
    {
        //return $this->getOrder()->getRealOrderId();
        return $this->_genRef->GenerateMbRef(
                              $this->_ifthenpayMbHelper->getEntidade(),
                              $this->_ifthenpayMbHelper->getSubentidade(),
                              $this->getOrder()->getRealOrderId(),
                              $this->getOrder()->getGrandTotal(), $comEspacos);
    }

    public function getValor(){
      return $this->getOrder()->formatPrice($this->getOrder()->getGrandTotal());
    }

    public function getOrder()
    {
      $order = $this->_checkoutSession->getLastRealOrder();

        return $order;
    }
}
