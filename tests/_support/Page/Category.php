<?php
namespace Page;

class Category
{


    public static $left = '//*[@name="first_price"]';
    public static $right = '//*[@name="last_price"]';
    public static $search = '//*[@name="search_price"]';

    public static $seeSearch = '//ul[@class="products-grid row"]';
    public static $price = '//*[@id="amount"]';

    public static $manufacture = '';

    // no products

    public static $noProducts = '//*[@class="col-main col-xs-12 col-sm-9"]';

    //cannot find item

    public static $picture = 'div.banner-left > a > img';
    public static $itemForm = 'div.ss-top-of-page';

    // reviews

    public static $clickReview = '//*[@class="content"]//div/div/a';
    public static $h1 = 'h1';

    // grid and list

    public static $list = '//*[@class="list"]';
    public static $seeList = '//ol[@id="products-list"]/li';

    public static $addToCompare = '//a[@class="link-compare"]';
    public static $seeCompare = '//div[@class="wrapper_box pop_compare1"]';
    public static $continue = '//*[@id="continue_shopping"]';

    public static $addToWishList = '//a[@class="link-wishlist"]';
    public static $seeWishList = '//div[@class="content"]/p';

    public static $addToCart = './/*[@id="products-list"]/li[1]/div/div/div[2]/div/div[3]/button';
    public static $seeAddToCart = '//li[@class="notice-msg"]/ul/li/span';

    public static $learnMore = '//a[@class="link-learn"]';
    public static $seeLearnMore = '//li[@class="product"]/strong';


    public function __construct(\AcceptanceTester $I) {
        $this->tester = $I;
    }

    public function checkInputPrices ($leftPrice,$rightPrice){
        $I = $this->tester;

        //$I->amOnPage('/');
        //$I->click('//div[@class="parentMenu"]//span');
        //$I->seeElement('//div[@class="category-products"]');
        $I->fillField(self::$left ,$leftPrice);
        $I->fillField(self::$right,$rightPrice);
        $I->click(self::$search);
        $I->waitForAjax();
        $I->seeElement(self::$price);
        $I->seeElement(self::$seeSearch);
    }

    public function checkIsNotFindPrice($leftPrice,$rightPrice){
        $I = $this->tester;


        $I->fillField(self::$left ,$leftPrice);
        $I->fillField(self::$right,$rightPrice);
        $I->click(self::$search);
        $I->scrollUp(500);
        $I->waitForElementVisible(self::$noProducts);
        $I->getVisibleText('There are no products matching the selection.',self::$noProducts);
        $I->seeElement(self::$noProducts);
    }

    public function checkCannotFindYourWantedItem2()
    {
        $I = $this->tester;

        $I->getVisibleText('Item Request Form', self::$itemForm);
        $I->seeElement(self::$itemForm);
    }

    public function recentReviewBlock(){

        $I = $this->tester;
        $I->amOnPage('/');
        $I->click('//div[@class="parentMenu"]//span');
        $I->seeElement('//div[@class="category-products"]');
        $I->scrollDown(200);
        $I->click(self::$clickReview);
        $I->waitForElementVisible(self::$h1);
        $I->seeElement(self::$h1);
        $I->moveBack();

    }

    public function checkGridAndList(){
        $I = $this->tester;

        $I->amOnPage('/');
        $I->click('//div[@class="parentMenu"]//span');
        $I->seeElement('//div[@class="category-products"]');
        $I->click(self::$list);
        $I->waitForAjax(20);
        $I->seeElement(self::$seeList);

                $I->click(self::$addToCompare);
                $I->waitForAjax(20);
                $I->waitForElementVisible(self::$seeCompare);
                $I->see('Go to list Compare', self::$seeCompare);
                //$I->click(self::$continue);
                $I->reloadPage();

                $I->click(self::$addToWishList);
                $I->see('If you have an account with us, please log in.',self::$seeWishList);
                $I->moveBack();
/*
             $I->click(self::$addToCart);
             $I->waitAlertAndAccept();
             $I->see('Please specify the product',self::$seeAddToCart);
             $I->moveBack();
*/

        $I->click(self::$learnMore);
            $I->seeElement(self::$seeLearnMore);


    }

















}