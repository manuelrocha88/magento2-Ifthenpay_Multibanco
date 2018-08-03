<?php
/**
* Ifthenpay_Multibanco
*
* @package     Ifthenpay_Multibanco
* @author      Manuel Rocha
* @copyright   Manuel Rocha (http://www.manuelrocha.biz)
* @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*
* Ifthenpay_Multibanco CreateInvoiceService
*
* @author   Alexandre de Freitas Caetano <alexandrefc2@hotmail.com>
*/

namespace Ifthenpay\Multibanco\Model\Service;

use Magento\Sales\Model\Service\InvoiceService;
use Magento\Framework\DB\Transaction;
use Magento\Sales\Model\Order;

/**
 * Service responsible for creating new invoices for orders
 */
class CreateInvoiceService
{
    /**
     * @var Magento\Sales\Model\Service\InvoiceService
     */
    protected $invoiceService;

    /**
     * @var Magento\Framework\DB\Transaction
     */
    protected $transaction;

    /**
     * @param Magento\Sales\Model\Service\InvoiceService    $invoiceService
     * @param Magento\Framework\DB\Transaction              $transaction
     *
     * @return void
     */
    public function __construct(
        InvoiceService $invoiceService,
        Transaction $transaction
    ) {
        $this->invoiceService = $invoiceService;
        $this->transaction = $transaction;
    }

    /**
     * Creates an invoice for a given order
     *
     * @param   Magento\Sales\Model\Order   $order
     *
     * @return boolean
     */
    public function createInvoice(Order $order)
    {
        if(!$order->getId()) {
            return false;
        }

        if($order->canInvoice()) {
            $invoice = $this->invoiceService->prepareInvoice($order);
            $invoice->register();
            $invoice->save();

            $transactionSave = $this->transaction->addObject(
                $invoice
            )->addObject(
                $invoice->getOrder()
            );

            $transactionSave->save();

            $order->addStatusHistoryComment(
                __('Added invoice #%1 to customer order', $invoice->getId())
            )->setIsCustomerNotified(false)
            ->save();
        }

        return true;
    }
}
