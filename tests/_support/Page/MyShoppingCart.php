<?php
namespace Page;

class MyShoppingCart
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

    // links

    public static $decs = '';
    public static $shipping = '';
    public static $returns = '';




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





















}