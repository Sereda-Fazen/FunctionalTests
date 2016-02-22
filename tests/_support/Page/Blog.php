<?php
namespace Page;

class Blog
{

    public static $URL = '/blog/';
    public static $cat = '#wp-category-list > li:nth-of-type(2) > a';
    public static $archives = '#wp-archive-list > li:nth-of-type(2) > a';
    public static $seeArchives = 'div.post-list.row.js-masonry > div:nth-of-type(2) > div.post-date';
    public static $title = 'div.post-list.row.js-masonry > div:nth-of-type(2) > h2 > a';
    public static $readMore = '//*[@class="read-more"]/i';
    public static $navigation2 = 'ol > li:nth-of-type(2) > a';
    public static $navigationNext = 'a.next.i-next';
    public static $navigationPrev = 'a.previous.i-previous';


    public function __construct(\AcceptanceTester $I) {
        $this->tester = $I;
    }



    public function blog(){
        $I = $this->tester;
        $I->amOnPage(self::$URL);

        $I->click(self::$cat);
        $I->seeElement('div.post-list.row.js-masonry > div:nth-of-type(2) > h2 > a');
        $I->click(self::$archives);
        $I->seeElement(self::$seeArchives);
        $I->amOnPage(self::$URL);
        $I->click(self::$title);
        $I->seeElement('div.page-titles.post-title > h1');
        $I->moveBack();
        $I->click(self::$readMore);
        $I->seeElement('div.page-titles.post-title > h1');
        $I->moveBack();

        $I->scrollDown(2000);
        $I->click(self::$navigationNext);
        $I->wait(1);
        $I->scrollDown(2000);
        $I->click(self::$navigationPrev);
        $I->wait(1);
        $I->click(self::$navigation2);
        $I->wait(1);


        return $this;
    }





}