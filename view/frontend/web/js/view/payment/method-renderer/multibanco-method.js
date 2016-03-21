/**
* Ifthenpay_Multibanco module dependency
*
* @category    Gateway Payment
* @package     Ifthenpay_Multibanco
* @author      Manuel Rocha
* @copyright   Manuel Rocha (http://www.manuelrocha.biz)
* @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*/
 define(
     [
         'Magento_Checkout/js/view/payment/default'
     ],
     function (Component) {
         'use strict';
         return Component.extend({
            defaults: {
                template: 'Ifthenpay_Multibanco/payment/multibanco-form'
            },


            getCode: function() {
                return 'ifthenpay_multibanco';
            },

            isActive: function() {
                return true;
            },
            /**
             * Get value of instruction field.
             * @returns {String}
             */
            getInstructions: function () {
                return window.checkoutConfig.payment.instructions[this.item.method];
            }
        });
    }
);
