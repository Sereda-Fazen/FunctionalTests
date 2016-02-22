<?php
namespace Step\Acceptance;

class ForgotPassSteps extends \AcceptanceTester
{

    public function gMailAuth()
    {
        $I = $this;
        $I->amOnUrl("https://mail.yahoo.com");
        $I->fillField('//*[@id="login-username"]', 'denimio_test@yahoo.com');
        $I->fillField('//*[@id="login-passwd"]', '!1qwerty');
        $I->click('//*[@id="login-signin"]');
        $I->getVisibleText('Denimio');
        $I->waitForElementVisible('div.name.first');
        $I->click('div.name.first');

    }


    public function remoteWindow(){
        $I = $this;
        $I->waitForElement('td > p:nth-of-type(2) > a');
        $I->click('td > p:nth-of-type(2) > a');
        $I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
            $handles = $webdriver->getWindowHandles();
            $last_window = end($handles);
            $webdriver->switchTo()->window($last_window);
        });
    }

    public function remoteWindow2(){
        $I = $this;

        $I->click('div.banner-left > a > img');
        $I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
            $handles = $webdriver->getWindowHandles();
            $last_window = end($handles);
            $webdriver->switchTo()->window($last_window);
        });


    }

    public function newPass() {
        $I = $this;
        $I->wait(2);
        $I->see('Reset a Password','h1');
        $I->fillField('#password', '123456');
        $I->fillField('#confirmation', '123456');
        $I->click('Reset a Password');
        $I->see('Your password has been updated.', 'li.success-msg');
    }

}