<?php
namespace Page;

class MainMenu
{

    public static $URL = '/';
    public static $top = '//*[@class="pt_custommenu"]/div[1]';
    public static $bottoms = '//*[@class="pt_custommenu"]/div[2]';
    public static $accessories = '//*[@class="pt_custommenu"]/div[3]';
    public static $newArrivals = '//*[@class="pt_custommenu"]/div[4]';
    public static $brands = '//*[@id="pt_menu_brands"]/div/a';
    public static $calendar = '//*[@id="pt_menu_link"]';


    public static $GRBOnCart = 'a > span > span.price';


    /**
     * Random Products
     */

    public static $prev = '//*[@class="bx-prev"]';
    public static $next = '//*[@class="bx-next"]';

    // Add to ..

    public static $moveTo = 'ul.products-grid > li:first-child > div.item-inner > div.images-content > a.item-link > img';

    public static $waitCart = '//*[@class="button btn-cart"]';
    public static $waitWishList = '//*[@class="link-wishlist"]';
    public static $waitCompare = '//*[@class="link-compare"]';

    public static $waitLinks = '//ul[@class="add-to-links"]';

    public static $clickCart = '//*[@class="button btn-cart"]';
    public static $clickWishList = '//*[@class="link-wishlist"]';
    public static $clickCompare ='//*[@class="link-compare"]';

    public static $formCart = '//*[@class="wrapper_box pop_compare1"]';




    /**
     * Blog
     */

    public static $fromBlog = '//*[@class="block blog-recent-posts"]/div/h3';
    public static $more = '//span[@class="more-link"]/a';
    public static $seeBlog = '//*[@class="blog-home"]';
    public static $titleArticle = '//h4/a';
    public static $seeArticle = '//*[@class="col-main"]';


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
    public function getMainMenu(){
        $I = $this->tester;
        $I->click(self::$top);
        $I->seeElement('div.col-main');
        $I->click(self::$bottoms);
        $I->seeElement('div.col-main');
        $I->click(self::$accessories);
        $I->seeElement('div.col-main');
        $I->click(self::$newArrivals);
        $I->seeElement('div.col-main');
        $I->click(self::$brands);
        $I->seeElement('//*[@class="product-image"]');
        $I->click(self::$calendar);
        $I->seeElement('span.fc-header-title > h2');
        return $this;
    }

    public function getRandom(){
        $I = $this->tester;
        $I->amOnPage(self::$URL);
        $I->scrollDown(1000);
        $I->moveMouseOver(self::$next);
        $I->click(self::$next);
        $I->wait(4);
        $I->moveMouseOver(self::$prev);
        $I->click(self::$prev);
        $I->wait(4);

        return $this;
    }

    public function getRandomAddToCart(){
        $I = $this->tester;
        $I->amOnPage(self::$URL);
        $I->scrollDown(1500);
/*
        $I->moveMouseOver(self::$waitLinks);
        $I->waitForElementVisible(self::$waitLinks);
        $I->click(self::$clickCart);
        $I->seeElement('h1');
        $I->moveBack();
        $I->wait(2);
*/
        $I->waitForElementVisible(self::$moveTo);
        $I->moveMouseOver(self::$moveTo);
        $I->waitForElementVisible(self::$waitWishList);
        $I->click(self::$clickWishList);
        $I->seeElement('div.new-users > div.content > p');
        $I->moveBack();
        $I->wait(2);

        //$I->waitForElementVisible(self::$moveTo);
        $I->moveMouseOver(self::$moveTo);
        $I->waitForElementVisible(self::$waitCompare);
        $I->click(self::$clickCompare);
        $I->waitForElementVisible(self::$formCart);
        $I->see('Go to list Compare','//*[@id="shopping_cart"]');

        return $this;
    }



    public function getBlog(){
        $I = $this->tester;
        $I->amOnPage(self::$URL);
        $I->scrollDown(2000);
        $I->waitForElementVisible(self::$fromBlog);
        $I->click(self::$more);
        $I->seeElement(self::$seeBlog);
        $I->moveBack();
        $I->click(self::$titleArticle);
        $I->seeElement(self::$seeArticle);
        $I->moveBack();

        return $this;
    }





}