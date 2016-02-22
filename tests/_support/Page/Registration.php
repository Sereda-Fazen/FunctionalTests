<?php
namespace Page;

class Registration
{

    public static $URL = '/';
    public static $logIn = '//a[@class="login_click"]';
    public static $createAccount = 'div.new-users > div.buttons-set > button.button > span > span';
    public static $firsName = '#firstname';
    public static $lastName = '#lastname';
    public static $email = '#email_address';
    public static $subscription = '#is_subscribed';
    public static $pass = '#password';
    public static $confirmation = '#confirmation';
    public static $submit = 'Submit';
    public static $logout = 'li.dropit-trigger > a';
    protected $tester;
    public function __construct(\AcceptanceTester $I)
    {
        $this->tester = $I;
    }
    public function register($fName,$lName,$email, $pass1, $pass2)
    {
        $I = $this->tester;

        $I->amOnPage(self::$URL);
        $I->click(self::$logIn);
        $I->waitForElement(self::$createAccount);
        $I->click(self::$createAccount);
        $I->fillField(self::$firsName, $fName);
        $I->fillField(self::$lastName, $lName);
        $I->fillField(self::$email, $email);
        $I->click(self::$subscription);
        $I->fillField(self::$pass, $pass1);
        $I->fillField(self::$confirmation, $pass2);

        $I->click(self::$submit);
        return $this;
    }
    public function logout()
    {
        $I = $this->tester;
        $I->click(self::$logout);
    }
}
