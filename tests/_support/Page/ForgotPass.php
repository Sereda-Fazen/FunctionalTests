<?php
namespace Page;

class ForgotPass
{
    public static $URL = '/customer/account/login/';
    public static $forgotLink = 'a.f-left';
    public static $mail = '#email_address';
    public static $subSave = 'div.buttons-set > button.button > span > span';
    public static $msg = 'li.success-msg';

    //delete

    public static $URL2 = 'https://mail.yahoo.com';
    public static $email = '//*[@id="login-username"]';
    public static $pass = '//*[@id="login-passwd"]';
    public static $enter = '//*[@id="login-signin"]';
    public static $waitMsg = '//*[@class="icon info info-real info-unread "]';
    public static $clickOldMsg = 'div.cbox > input';
    public static $delete = '#btn-delete > span.icon-text';
    public static $msgRemove = '//p[@class="empty-folder-footer"]';

    protected $tester;

    public function __construct(\AcceptanceTester $I) {
        $this->tester = $I;
    }
    public function forgot($mailPass) {
        $I = $this->tester;
        $I->amOnPage(self::$URL);
        $I->click(self::$forgotLink);
        $I->click(self::$mail);
        $I->fillField(self::$mail, $mailPass);
        $I->click(self::$subSave);
        $I->see('If there is an account associated with denimio_test@yahoo.com you will receive an email with a link to reset your password.', self::$msg);
    }

    public function deleteMsg(){
        $I = $this->tester;
        $I->amOnUrl(self::$URL2);

        $I->waitForElementNotVisible(self::$waitMsg,5);
        $I->wait(3);
        $I->click(self::$clickOldMsg);
        $I->waitForElementVisible(self::$delete);
        $I->click(self::$delete);
        $I->waitForElement(self::$msgRemove);
    }


}