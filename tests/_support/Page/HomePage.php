<?php
namespace Page;

class HomePage
{
    public static $URL = '/';
    public static $URL2 = '/customer/account/login/';

    public static $invalidUrl = 'div.std';
    public static $backHomePage = 'ul.disc > li:first-child > a';

    /**
     * Cart
     */

    //empty cart

    public static $moveToCart = 'div.top-cart-title > a';
    public static $empty = 'p.empty';

    // full cart

    public static $clickTops = '//*[@class="parentMenu"]/a/span';
    public static $addToCart = '//*[@class="images-content"]';
    public static $selectChoose = 'select.required-entry';
    public static $selectSize = '//*[@class="input-box"]/select/option[2]';
    public static $add = 'button.button.btn-cart > span';
    public static $continue = '#continue_shopping';
    public static $cartDelete = '//*[@class="product-details"]/a';
    public static $fullCart = '//*[@class="block-cart"]';



    //footer links

    public static $orderHistory = 'div.footer-static-inner > div:nth-of-type(2) > div.footer-static-content > ul > li:nth-of-type(2) > a';
    public static $orderSee =  'h1';
    public static $myComparison = 'div.footer-static-content > ul > li.last > a';


    //subscription

    public static $clickSignUp = 'div.actions > button.button > span > span';
    public static $emptyField = '//*[@class="validation-advice"]';


    public static $fullField = '#newsletter';
    public static $invalidField = '#advice-validate-email-newsletter';
    public static $error = 'li.error-msg';
    public static $success = 'li.success-msg';



    protected $tester;

    public function __construct(\AcceptanceTester $I)
    {
        $this->tester = $I;
    }
    public function home()
    {
        $I = $this->tester;
        $I->amOnPage(self::$URL);

        return $this;
    }

    public  function invalidURL(){
        $I = $this->tester;
        $I->amOnPage('/testWrong/');
        $I->waitForElement('h3',3);
        $I->see('WHOOPS, OUR BAD...',self::$invalidUrl);
        $I->click(self::$backHomePage);
    }


    public function emptyCart()
    {
        $I = $this->tester;
        $I->amOnPage(self::$URL);
        $I->moveMouseOver(self::$moveToCart);
        $I->see('You have no items in your shopping cart.',self::$empty);

        return $this;
    }

    public function fullCart()
    {
        $I = $this->tester;
        $I->amOnPage(self::$URL);
        $I->click(self::$clickTops);
        $I->click(self::$addToCart);
        $I->click(self::$selectChoose);
        $I->click(self::$selectSize);
        $I->click(self::$add);
        $I->waitForElementVisible(self::$continue);
        $I->click(self::$continue);
        $I->wait(2);
        $I->moveMouseOver(self::$fullCart);
        $I->waitForElementVisible(self::$cartDelete);
        $I->click(self::$cartDelete);
        $I->acceptPopup();

        return $this;
    }


    public function footerLinksAccount()
    {
        $I = $this->tester;
        $I->amOnPage(self::$URL2);
        $I->click(self::$orderHistory);
        $I->seeElement(self::$orderSee);

        $I->click(self::$myComparison);
        $I->seeElement(self::$orderSee);

        return $this;
    }




    public function subscribeEmptyField()
    {
        $I = $this->tester;
        $I->amOnPage(self::$URL2);
        $I->click(self::$clickSignUp);
        $I->see('THIS IS A REQUIRED FIELD.',self::$emptyField);
        $I->wait(2);

    }

    public function subscribeInvalidEmail ($email)
    {
        $I = $this->tester;
        $I->fillField(self::$fullField, $email);
        $I->click(self::$clickSignUp);
        $I->see('PLEASE ENTER A VALID EMAIL ADDRESS. FOR EXAMPLE JOHNDOE@DOMAIN.COM.',self::$invalidField);
        $I->wait(2);
    }

    public function subscribeIsNotEmail ($email)
    {
        $I = $this->tester;
        $I->fillField(self::$fullField, $email);
        $I->click(self::$clickSignUp);
        $I->see('There was a problem with the subscription:',self::$error);
        $I->wait(2);
    }

    public function subscribeSuccess ($email)
    {
        $I = $this->tester;
        $I->fillField(self::$fullField, $email);
        $I->click(self::$clickSignUp);
        $I->see('Thank you for your subscription.',self::$success);
        $I->wait(2);
    }













    /**
     * Footer
     */

    public static $facebook = '//em[@class="fa fa-facebook fa-stack-1x fa-inverse"]';
    public static $instagram = '//em[@class="fa fa-instagram fa-stack-1x fa-inverse"]';
    public static $twitter = '//em[@class="fa fa-twitter fa-stack-1x fa-inverse"]';
    public static $pinterest = '//em[@class="fa fa-pinterest fa-stack-1x fa-inverse"]';

    public static $denimioFacebook = '//img[@class="profilePic img"]';
    public static $denimioTwitter = '//img[@class="ProfileAvatar-image "]';
    public static $denimioPinterest = 'Denimio.com';
    public static $denimioInstagram = 'denimio_shop';



    public function homeFooterFacebook()
    {
        $I = $this->tester;
        $I->amOnPage(self::$URL2);
        $I->scrollDown(200);
        $I->waitForElementVisible(self::$facebook);
        $I->click(self::$facebook);
        $I->wait(2);

    }
    public function homeFooterInstagram()
    {
        $I = $this->tester;
        $I->amOnPage(self::$URL2);
        $I->scrollDown(200);
        $I->waitForElementVisible(self::$instagram);
        $I->click(self::$instagram);
        $I->wait(2);

    }
    public function homeFooterTwiter()
    {
        $I = $this->tester;
        $I->amOnPage(self::$URL2);
        $I->scrollDown(200);
        $I->waitForElementVisible(self::$twitter);
        $I->click(self::$twitter);
        $I->wait(2);
    }
    public function homeFooterPinterest()
    {
        $I = $this->tester;
        $I->amOnPage(self::$URL2);
        $I->scrollDown(200);
        $I->waitForElementVisible(self::$pinterest);
        $I->click(self::$pinterest);
        $I->wait(2);

    }

    public function assertCheckFacebook()
    {
        $I = $this->tester;
        $I->waitForElement(self::$denimioFacebook);
    }

    public function assertCheckTwitter()
    {
        $I = $this->tester;
        $I->waitForElement(self::$denimioTwitter);
    }
    public function assertCheckPinterest()
    {
        $I = $this->tester;
        $I->waitForText(self::$denimioPinterest, 4);

    }
    public function assertCheckInstagram()
    {
        $I = $this->tester;
        $I->waitForText(self::$denimioInstagram, 4);

    }





}