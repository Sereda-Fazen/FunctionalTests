<?php
namespace Page;

class Login
{

    public static $URL = '/';
    public static $clickLogIn = 'a.login_click';

    public static $email = '#email';
    public static $email2 = '#email';
    public static $pass = '#pass';
    public static $submit = '[name="send"] > span > span';
    public static $logout = 'li.dropit-trigger > a';

    public static $msg = 'div.col-main > p';

    protected $tester;

    public function __construct(\AcceptanceTester $I)
    {
        $this->tester = $I;
    }

    public function loginFunc($name, $password)
    {
        $I = $this->tester;

        $I->amOnPage(self::$URL);
        $I->click(self::$clickLogIn);
        $I->fillField(self::$pass, $password);
        $I->click(self::$submit);
        $I->see('Hello, alex sereda!','div.welcome-msg');


        return $this;
    }



    public function login($name, $password)
    {
        $I = $this->tester;

        $I->amOnPage(self::$URL);
        $I->click(self::$clickLogIn);
        $I->fillField(self::$email, $name);
        $I->fillField(self::$pass, $password);
        $I->click(self::$submit);
        $I->see('Hello, alex sereda!','div.welcome-msg');


        return $this;
    }

    public function logout()
    {
        $I = $this->tester;
        $I->click(self::$logout);
        $I->see('You have logged out and will be redirected to our homepage in 5 seconds.',self::$msg);

    }


}