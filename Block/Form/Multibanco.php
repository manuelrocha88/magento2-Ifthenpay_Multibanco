<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Ifthenpay\Multibanco\Block\Form;

/**
 * Abstract class for Cash On Delivery and Bank Transfer payment method form
 */
class Multibanco extends \Magento\Payment\Block\Form
{
  protected $_template = 'form/multibanco.phtml';

    /**
     * Instructions text
     *
     * @var string
     */
    protected $_instructions;

    /**
     * Get instructions text from config
     *
     * @return null|string
     */
    public function getInstructions()
    {
        if ($this->_instructions === null) {
            /** @var \Magento\Payment\Model\Method\AbstractMethod $method */
            $method = $this->getMethod();
            $this->_instructions = $method->getConfigData('instructions');
        }
        return $this->_instructions;
    }
}
