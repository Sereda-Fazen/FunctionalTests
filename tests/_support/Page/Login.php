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
        $I->fillField(self::$email, $name);
        $I->fillField(self::$pass, $password);
        $I->click(self::$submit);
        $I->seeElement('//div[@class="dashboard"]/div/h1');


        return $this;
    }


}