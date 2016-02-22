<?php
namespace Step\Acceptance;

class CategorySteps extends \AcceptanceTester
{


    public function category()
    {
        $I = $this;
        $I->amOnPage('/');
        $I->click('//div[@class="parentMenu"]//span');
        $I->seeElement('//div[@class="category-products"]');
    }


    public function categoryRemoveCategory()
    {
        $I = $this;
        $I->category();
        $category = rand(1,count($I->grabMultiple('//dd[@class="odd"]/ol/li')));
        $I->click('#narrow-by-list > dd:nth-of-type(1) > ol > li:nth-of-type('.$category.') > a.ajaxLayer');
        $I->waitForAjax(20);

        $I->seeElement('//*[@class="category-products"]');
        $I->seeElement('//span[@class="label"]');
        $I->click('//a[@class="btn-remove"]');
        $I->waitForAjax(20);
        $I->dontSee('Category:','//span[@class="label"]');


    }

    public function categoryRemoveManufacture()
    {
        $I = $this;
        $I->category();
        $manufacture = rand(1,count($I->grabMultiple('//dd[@class="even"]/ol/li')));
        $I->click('#narrow-by-list > dd:nth-of-type(2) > ol > li:nth-of-type('.$manufacture.') > a.ajaxLayer');
        $I->waitForAjax(20);

        $I->seeElement('//*[@class="category-products"]');
        $I->seeElement('//span[@class="label"]');
        $I->click('//a[@class="btn-remove"]');
        $I->waitForAjax(20);
        $I->dontSee('Manufacturer:','//span[@class="label"]');


    }
    public function categoryClearAllCategoryAndManufacture()
    {
        $I = $this;
        $I->category();
        $category2 = rand(1, count($I->grabMultiple('//dd[@class="odd"]/ol/li')));
        $I->click('#narrow-by-list > dd:nth-of-type(1) > ol > li:nth-of-type(' . $category2 . ') > a.ajaxLayer');
        $I->waitForAjax(20);
        $I->seeElement('//*[@class="category-products"]');
        $I->seeElement('//span[@class="label"]');

        $manufacture2 = rand(1, count($I->grabMultiple('//dd[@class="odd"]/ol/li')));
        $I->click('ol > li:nth-of-type(' . $manufacture2 . ') > a.ajaxLayer');
        $I->waitForAjax(20);
        $I->seeElement('//*[@class="category-products"]');
        $I->seeElement('//div[@class="currently"]');

        $I->click('//div[@class="actions"]/a');
        $I->waitForAjax(20);
        $I->dontSeeElement('//div[@class="currently"]');
    }

    public function categoryCheckPriceRunner()
    {
        $I = $this;
        $I->category();
        $I->scrollDown(500);

        $I->dragAndDrop('a.ui-slider-handle.ui-state-default.ui-corner-all.first_item','div.ui-slider-range.ui-widget-header.ui-corner-all');
        $I->waitForAjax(20);
        $I->seeElement('//*[@id="amount"]');

        $I->reloadPage();
        $I->dragAndDrop('a.ui-slider-handle.ui-state-default.ui-corner-all.last_item','div.ui-slider-range.ui-widget-header.ui-corner-all');
        $I->waitForAjax(20);
        $I->seeElement('//*[@id="amount"]');
    }

    public function sortingOfItems()
    {
        $I = $this;

        $I->category();

        $sort = count($I->grabMultiple('//div[@class="category-products"]/div[@class="toolbar"]/div/div[@class="sort-by hidden-xs"]/select/option'));
        $show = count($I->grabMultiple('//div[@class="category-products"]/div[@class="toolbar"]//div[@class="limiter hidden-xs"]/select/option'));
        $pages = count($I->grabMultiple('//div[@class="category-products"]/div[@class="toolbar"]//div[@class="pages"]/ol/li'));
        for ($s = 1; $s <= $sort; $s++) {
            $I->click('//*[@class="sort-by hidden-xs"]/select');
            $I->click('//*[@class="sort-by hidden-xs"]/select/option[' . $s . ']');
            $I->waitForAjax(20);
            $I->seeElement('//*[@class="sort-by hidden-xs"]');

                $I->click('div.category-products > div.toolbar > div.pager > div.limiter.hidden-xs > select');
                $I->waitForElementVisible('//div[@class="limiter hidden-xs"]/select/option[' . rand(1,$show) . ']');
                $I->click('//div[@class="limiter hidden-xs"]/select/option[' . rand(1,$show) . ']');
                $I->waitForAjax(20);
                $I->seeElement('//*[@class="limiter hidden-xs"]');



                $I->click('//div[@class="pages"]/ol/li[' . rand(2, $pages) . ']/a');
                $I->waitForAjax(20);
                $I->seeElement('//*[@class="limiter hidden-xs"]');
                $I->wait(2);

            }
        $I->click('//i[@class="fa fa-long-arrow-up"]');
        $I->waitForAjax(20);
        $I->seeElement('//*[@class="limiter hidden-xs"]');

    }





















































    }