<?php
namespace Step\Acceptance;

class MyShoppingCartSteps extends \AcceptanceTester
{

    public function checkAccessories()
    {
        $I = $this;
        $wallet = 'WALLET';
        $I->amOnPage('/');
        $I->fillField('#search', 'wallet');
        $I->click('i.fa.fa-search');
        $I->see('SEARCH RESULTS FOR', 'h1');
        $I->see($wallet);


    }

    public function checkFunctionalInRandomOrder()
    {
        $I = $this;
        $I->checkAccessories();

        $blockAcc1 = rand(1, count($I->grabMultiple('//div[@class="category-products"]/ul[1]/li')));
        $blockAcc2 = rand(1, count($I->grabMultiple('//div[@class="category-products"]/ul')));
        $I->wait(2);
        $test = count($I->grabMultiple('//div[@class="category-products"]/ul[' . $blockAcc2 . ']/li[' . $blockAcc1 . ']//div/div/div/div/button'));

        $I->moveMouseOver('//div[@class="category-products"]/ul[' . $blockAcc2 . ']/li[' . $blockAcc1 . ']');
        $I->wait(2);

        if ($test == true) {
            $I->moveMouseOver('//div[@class="category-products"]/ul[' . $blockAcc2 . ']/li[' . $blockAcc1 . ']//div/div/div/div/button');
            $I->click('//div[@class="category-products"]/ul[' . $blockAcc2 . ']/li[' . $blockAcc1 . ']//div/div/div/div/button');

            $I->waitForAjax(10);
            $I->waitForElement('//div[@class="wrapper_box"]');
            $I->click('//a[@id="shopping_cart"]');
            $I->see('SHOPPING CART', 'h1');
            $I->click('//td[@class="a-center"]/a');
            $I->see('UPDATE CART', '//button[@class="button btn-cart"]/span');
            $I->fillField('//div[@class="add-to-cart"]/input', '2');
            $I->click('//button[@class="button btn-cart"]/span');
            $I->scrollUp(300);
            $I->wait(3);
            $I->see('2 items', 'a > span > span:first-child');
            $I->click('a > span > span:first-child');
            $I->fillField('input.input-text.qty', '3');
            $I->click('//button[@name="update_cart_action"]');
            $I->see('3 items', 'a > span > span:first-child');

        } else {
            $I->reloadPage();
            $I->moveMouseOver('//div[@class="category-products"]/ul[' . $blockAcc2 . ']/li[' . $blockAcc1 . ']');
            $I->click('//div[@class="category-products"]/ul[' . $blockAcc2 . ']/li[' . $blockAcc1 . ']//div/div/div/div/button');

            $I->waitForAjax(10);
            $I->waitForElement('//div[@class="wrapper_box"]');
            $I->click('//a[@id="shopping_cart"]');
            $I->see('SHOPPING CART', 'h1');
            $I->click('//td[@class="a-center"]/a');
            $I->see('UPDATE CART', '//button[@class="button btn-cart"]/span');
            $I->fillField('//div[@class="add-to-cart"]/input', '2');
            $I->click('//button[@class="button btn-cart"]/span');
            $I->scrollUp(300);
            $I->wait(3);
            $I->see('2 items', 'a > span > span:first-child');
            $I->click('a > span > span:first-child');
            $I->fillField('input.input-text.qty', '3');
            $I->click('//button[@name="update_cart_action"]');
            $I->see('3 items', 'a > span > span:first-child');


        }
        $wallet = 'WALLET';
        $I->click('button.button.btn-continue > span');

        $I->fillField('#search', 'wallet');
        $I->click('i.fa.fa-search');
        $I->see('SEARCH RESULTS FOR', 'h1');
        $I->see($wallet);

        $blockAcc1 = rand(1, count($I->grabMultiple('//div[@class="category-products"]/ul[1]/li')));
        $blockAcc2 = rand(1, count($I->grabMultiple('//div[@class="category-products"]/ul')));

        $I->moveMouseOver('//div[@class="category-products"]/ul[' . $blockAcc2 . ']/li[' . $blockAcc1 . ']');
        $I->wait(2);
        $I->click('//div[@class="category-products"]/ul[' . $blockAcc2 . ']/li[' . $blockAcc1 . ']//div/div/div/div/button');

        $I->waitForAjax(10);
        $I->waitForElement('//div[@class="wrapper_box"]');
        $I->click('//a[@id="shopping_cart"]');
        $I->see('SHOPPING CART', 'h1');
        $I->seeElement('//tr[@class="last even"]');
        $I->click('//tr[@class="last even"]/td[7]/a');
        $I->acceptPopup();
        $I->waitForAjax(10);
        $I->waitForElementNotVisible('//tr[@class="last even"]');
        $I->click('#empty_cart_button > span');
        $I->see('SHOPPING CART IS EMPTY', 'h1');

    }

    public function checkCouponAndGiftCard()
    {
        $I = $this;

        $I->checkAccessories();

        $I->moveMouseOver('//div[@class="category-products"]/ul[1]/li[1]');
        $I->click('//div[@class="category-products"]/ul[1]/li[1]//div/div/div/div/button');

        $I->waitForElement('//div[@class="wrapper_box"]');
        $I->click('//a[@id="shopping_cart"]');
        $I->see('SHOPPING CART', 'h1');

        $I->scrollDown(600);
        $I->waitForElementVisible('//div[@class="buttons-set"]/button/span');
        $I->click('//div[@class="buttons-set"]/button/span');
        $I->see('This is a required field.', '#advice-required-entry-coupon_code');
        $I->fillField('#coupon_code', 'test');
        $I->click('//div[@class="buttons-set"]/button/span');
        $I->waitForElement('li.error-msg');
        $I->see('Coupon code "test" is not valid.', 'li.error-msg');

        $I->click('#giftvoucher');
        $I->waitForElementVisible('#giftvoucher_code');
        $I->click('//div[@class="input-box"]/button/span');
        $I->see('Please enter your code','#giftcard_notice');

        $I->fillField('#giftvoucher_code','test');
        $I->click('//div[@class="input-box"]/button/span');
        $I->see('Gift card "test" is invalid.','li.error-msg');

        $I->click('#giftvoucher');
        $I->see('Your Gift Card information has been removed successfully.' ,'li.success-msg');

    }

    public function checkEstimateShippingAndTax(){
        $I = $this;
        $I->scrollDown(300);



    }

































}