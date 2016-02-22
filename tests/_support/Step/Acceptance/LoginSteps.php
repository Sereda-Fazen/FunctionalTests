<?php
namespace Step\Acceptance;

class LoginSteps extends \AcceptanceTester
{

    public function checkExistUser()
    {
        $I = $this;
        $grabMsg = $I->grabTextFrom('//ul[@class="messages"]');
        if (preg_match('/Thank you for registering with Denimio./i', $grabMsg) == 1) {
            $I->see('Thank you for registering with Denimio.', '//ul[@class="messages"]');
        } else {
            $I->see('There is already an account with this email address. ', '//ul[@class="messages"]');
        }
    }

    public function login()
        {
            $I = $this;
            $I->amOnPage('/customer/account/login/');
            $I->fillField('#email', 'dev.denimio@yahoo.com');
            $I->fillField('#pass', '123456');
            $I->click('Login');
            $I->see('From your My Account Dashboard','div.welcome-msg > p:nth-of-type(2)');
        }

        public function waitAlertWindow ()
        {
            $I = $this;
            $count = count($I->grabMultiple('//*[@class="col-2 addresses-additional"]/ol/li'));
            for ($d = $count; $d > 0; $d--) {
                $this->scrollDown(1000);
                $I->click('ol > li:nth-of-type(' . $d . ') > p > a.link-remove');
                $I->acceptPopup();
                $I->waitForElement('li.success-msg');
            }
        }

        public function giftCardEmpty()
        {
            $I = $this;
            $I->click('button.form-button.button.addredeem > span');
            for ($c = 9; $c >= 0; $c--) {
                $card = rand();
                $I->fillField('#gift-voucher-code', $card);
                $I->click('div.text-left > button:nth-of-type(1) > span > span');
                $I->see('Gift card "' . $card . '" is invalid.You have ' . $c . ' time(s) remaining to re-enter Gift Card code.','li.error-msg');
            }
            $I->fillField('#gift-voucher-code', $card);
            $I->click('div.text-left > button:nth-of-type(1) > span > span');
        }





}