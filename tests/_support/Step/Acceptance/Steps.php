<?php
namespace Step\Acceptance;

class Steps extends \AcceptanceTester
{

        public function processAddToCart(){
            $I = $this;
            $I->amOnPage('/');
            $I->moveMouseOver('#pt_custommenu > div:first-child > div.parentMenu > a');
            $I->waitForElement('//*[@id="block112"]');
            $I->waitForElementVisible('//*[@class="itemMenu level1"]/a');
            $I->click('//*[@class="itemMenu level1"]/a');
            $I->waitForElementVisible('div.category-products');
            $I->see('Sort By','div.category-products > div.toolbar');
        }
        public function addToCart(){
            $I = $this;
            $I->moveMouseOver('//*[@class="add-to-links"]');
            $I->waitForElementVisible('//*[@class="button btn-cart"]');
            $I->click('//*[@class="button btn-cart"]');
            $I->see('Description','ul.product-tabs');
        }

    public function selectSize(){
        $I = $this;
        $I->scrollDown(200);
        $I->click('select.required-entry');
        $I->click('//*[@id="attribute144"]/option[2]');
        $I->click('button.button.btn-cart > span');
        $I->waitForElementVisible('div.wrapper_box');
        $I->click('//*[@id="shopping_cart"]');
        $I->see('PROCEED TO CHECKOUT','button.button.btn-proceed-checkout.btn-checkout > span');
        $I->click('button.button.btn-proceed-checkout.btn-checkout > span');
    }

    public function processCheckout(){

            $I = $this;
            $billing = '#billing\3A ';
            $I->waitForElementVisible('#billing\3A firstname');
            $I->fillField($billing.'firstname', 'alex');
            $I->fillField($billing.'lastname', 'sereda');
            $I->fillField($billing.'email', 'dev.denimio@yahoo.com');
            $I->fillField('#billing-new-address-form > ul > li:nth-of-type(3) > div.one-field > input.required-entry.input-text', 'Test street 22V');
            $I->fillField($billing.'city', 'Kharkov');
            $I->fillField($billing.'postcode', '1rr354');
            $I->fillField($billing.'postcode', '61007');
            $I->click('//*[@id="billing:country_id"]/option[231]');
            $I->fillField($billing.'region', 'Kharkov');
            $I->fillField($billing.'telephone', '80934568798');
            $I->wait(3);


    }

    public function paymentMethod(){
            $I = $this;
            $I->scrollUp(200);
            $I->wait(3);
            $I->click('#p_method_paygent_cc');
            // Cards

           $I->click('#paygent_cc_cc_type');

           $I->click('//*[@id="paygent_cc_cc_type"]/option[2]');
           $I->waitForElementVisible('#paygent_cc_cc_number');
           $I->fillField('#paygent_cc_cc_number', '4012888888881881');

           //  month
           $I->click('#paygent_cc_expiration');
           $I->click('//*[@id="paygent_cc_expiration"]/option[2]');
           //year
           $I->click('#paygent_cc_expiration_yr');
           $I->click('//*[@id="paygent_cc_expiration_yr"]/option[3]');
           //what is this
           $I->click('a.cvv-what-is-this');
           $I->waitForElement('#payment-tool-tip');
           $I->click('#payment-tool-tip-close');
           $I->fillField('#paygent_cc_cc_cid', '123');

    }

    public function finishProcessCheckout(){
            $I = $this;
            $I->scrollDown(150);
            $I->click('#edit_shipping_document_confirmation');
            $I->click('//*[@id="edit_shipping_document_confirmation"]/option[4]');
            $I->click('#onestepcheckout-button-place-order');
            $I->waitForElementVisible('li.error-msg');
            $I->see('Network Error, E02004','li.error-msg');

    }


}