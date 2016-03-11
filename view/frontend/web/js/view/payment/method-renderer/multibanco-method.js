/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
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
