<?php
namespace Page;

class Product
{

    //review

    public static $clickReview = 'p.no-rating > a';
    public static $seeRating = 'fieldset';
    public static $checkRating = '//tr[@class="first last odd"]/td/input';
    public static $nickName = '#nickname_field';
    public static $summary = '#summary_field';
    public static $review = '#review_field';
    public static $submit = '//*[@id="review-form"]/div/button';
    public static $seeErrorReview = 'li.error-msg';

    //add to cart and to wishList

    public static $addToCompare = '//ul[@class="add-to-links"]/li[1]';
    public static $seeCompare = '//a[@id="shopping_cart"]';

    public static $addToWishList = '//ul[@class="add-to-links"]/li[2]';
    public static $seeList = 'div.registered-users > div.content > p:nth-of-type(1)';






    public function __construct(\AcceptanceTester $I) {
        $this->tester = $I;
    }

    public function checkMainBlockReview ($name,$summary,$review){
        $I = $this->tester;

        $rait = '//tr[@class="first last odd"]/td['.rand(1,5).']/input';
        $I->click(self::$clickReview);
        $I->seeElement(self::$seeRating);
        $I->click($rait);
        $I->fillField(self::$nickName, $name);
        $I->fillField(self::$summary, $summary);
        $I->click(self::$review);
        $I->fillField(self::$review, $review);
        $I->moveMouseOver(self::$submit);
        $I->click(self::$submit);
        $I->see('There was an error with the recaptcha code, please try again.',self::$seeErrorReview);
    }

    public function checkShareLinks ()
    {
        $I = $this->tester;
        $I->click(self::$addToCompare);
        $I->seeElement(self::$seeCompare);
        $I->reloadPage();

        $I->click(self::$addToWishList);
        $I->seeElement(self::$seeList);
        $I->moveBack();
    }





















}