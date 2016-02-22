<?php
namespace Step\Acceptance;

class ProductSteps extends \AcceptanceTester
{


    public function checkTops()
    {
        $I = $this;
        $I->amOnPage('/');
        $I->click('#pt_custommenu > div:first-child > div.parentMenu > a > span');
        $I->seeElement('//div[@class="category-products"]');

    }

    public function checkBottoms()
    {
        $I = $this;
        $I->amOnPage('/');
        $I->click('#pt_custommenu > div:nth-of-type(2) > div.parentMenu > a > span');
        $I->seeElement('//div[@class="category-products"]');

    }

    public function checkInRandomOrder(){
        $I = $this;
        $I->checkTops();
        $blockJeans = rand(1,count($I->grabMultiple('//div[@class="category-products"]/ul[1]/li')));
        $blockJeans2 = rand(1,count($I->grabMultiple('//div[@class="category-products"]/ul')));
        $I->wait(2);
        $I->click('//div[@class="category-products"]/ul['.$blockJeans2.']/li['.$blockJeans.']/div/div/a/img');
        $I->seeElement('//div[@class="product-essential"]/form/div[1]/div[2]');

    }



    public function checkPictureAndZoom()
    {
        $I = $this;
        //$I->amOnPage('//barns-outfitters-br610029-union-special-baseball-shirt.html');
        $I->waitForElement('//*[@id="wrap"]');
        $I->moveMouseOver('//*[@id="wrap"]');
        $I->waitForElementVisible('//div[@class="cloud-zoom-big"]');
        $I->moveMouseOver('//div[@class="cloud-zoom-big"]', 10, 50);
        $I->click('//div[@class="cloud-zoom-big"]');
        $I->waitForElementVisible('//div[@id="hoverNav"]');
        $I->seeElement('//div[@id="hoverNav"]');

        $I->moveMouseOver('//a[@id="nextLink"]');
        $I->getVisibleText('NEXT');
        $I->click('//a[@id="nextLink"]');
        $I->waitForAjax(10);

        $I->wait(2);
        $I->moveMouseOver('//a[@id="prevLink"]');
        $I->getVisibleText('PREV');
        $I->click('//a[@id="prevLink"]');
        $I->waitForAjax(10);
        $I->scrollDown(200);
        $I->click('//a[@id="bottomNavClose"]');
        $I->waitForElementVisible('p.no-rating > a');

    }
    public function checkPictureArrows()
    {
        $I = $this;
        $test2 = count($I->grabMultiple('//div[@class="more-views ma-thumbnail-container"]/div/div/ul/li'));
        $I->wait(3);
        $I->amOnPage('studiod-artisan-9776id-sweat-indigo.html');
        if ($test2 > 4) {
            //$I->click('//div[@class="more-views ma-thumbnail-container"]/div/div/ul/li[' . rand(5, $test2) . ']');
            $I->waitForElement('//div[@class="more-views ma-thumbnail-container"]/div/div/ul/li');
            for($s = 6; $s <= 8; $s++){
                $I->click('//div[@class="more-views ma-thumbnail-container"]/div/div/ul/li[' .$s. ']');
                $I->wait(1);
                $I->moveMouseOver('//*[@id="wrap"]');
                $I->waitForElement('//div[@class="cloud-zoom-big"]');
                $I->wait(1);
            }
            $I->click('//a[@class="bx-next"]');
            $I->waitForElement('//div[@class="more-views ma-thumbnail-container"]/div/div/ul/li[12]');
            $I->waitForElement('//div[@class="more-views ma-thumbnail-container"]/div/div/ul/li[10]');
            $I->wait(1);
            $I->click('//a[@class="bx-prev"]');
            $I->waitForElement('//div[@class="more-views ma-thumbnail-container"]/div/div/ul/li[5]');
            $I->waitForElement('//div[@class="more-views ma-thumbnail-container"]/div/div/ul/li[6]');
        } else {
            $I->waitForElement('//div[@class="more-views ma-more-img"]/ul/li[1]/a/img');
            $I->click('//div[@class="more-views ma-more-img"]/ul/li[1]/a/img');

        }
    }


    public function checkLinksForItem()
    {
        $I = $this;
        $countLinks = count($I->grabMultiple('//*[@class="product-tabs"]/li'));
        for($c=1; $c<=$countLinks; $c++) {
            $I->click('//*[@class="product-tabs"]/li['.$c.']/a');
        }
    }

    public function moduleSize (){
        $I = $this;
        $I->click('#product-options-right > div > a');
        $I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
            $handles = $webdriver->getWindowHandles();
            $last_window = end($handles);
            $webdriver->switchTo()->window($last_window);
        });
        $I->getVisibleText('Length (cm)');
        $I->click('//button[@class="button convert cm"]/span');
        $I->getVisibleText('Length (inch)');

        $I->waitForElementVisible('#size-guide > h2');
        $I->see('SIZING GUIDE:','#size-guide > h2');
        $I->click('#sizechart-notice > a');
        $I->waitForElementVisible('div.well > p:nth-of-type(5) > a');
        $I->click('div.well > p:nth-of-type(5) > a');
        $I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
            $handles = $webdriver->getWindowHandles();
            $last_window = end($handles);
            $webdriver->switchTo()->window($last_window);
        });
        $I->waitForElementVisible('//div[@class="page-title"]/h1');
        $I->see('Sizing Guide','h1');

    }

    public function checkSelectSizeForBottoms()
    {
        $I = $this;

        $I->checkBottoms();
        $I->checkInRandomOrder();

        $size = count($I->grabMultiple('//dd[@class="last"]/div/select/option'));
        $type = count($I->grabMultiple('//*[@id="product-options-left"]/dl/dd/div/select/option'));
        $union = count($I->grabMultiple('//select[@id="hemming-req-select"]/option'));
        $sub = count($I->grabMultiple('//div[@class="amxnotif-block"]/button'));


        if ($union > 1) {

            $I->click('//*[@id="product-options-left"]/dl/dd/div/select');
            $I->waitForElementVisible('//*[@id="product-options-left"]/dl/dd/div/select/option[2]');
            $I->click('//*[@id="product-options-left"]/dl/dd/div/select/option[2]');

            $I->getVisibleText('//dd[@class="last"]/div/select/option', 'Choose an Option...');

            $I->click('//dd[@class="last"]/div/select/option');
            $I->waitForElementVisible('//dd[@class="last"]/div/select/option[2]');
            $I->click('//dd[@class="last"]/div/select/option[2]');

            $I->getVisibleText('//select[@id="hemming-req-select"]/option', 'No');

            $I->click('//select[@id="hemming-req-select"]/option');
            $I->waitForElementVisible('//select[@id="hemming-req-select"]/option[2]');
            $I->click('//select[@id="hemming-req-select"]/option[2]');
            $I->moduleSize();

        } else {

            $I->click('//div[@class="amxnotif-block"]/button');
            $I->seeElement('div.validation-advice');
            $I->fillField('//input[@name="guest_email"]', 'johndoe@domain.com');
            $I->click('//div[@class="amxnotif-block"]/button');
            $grabMsg = $I->grabTextFrom('//ul[@class="messages"]');
            if (preg_match('/Thank you! You are already subscribed to this product./i', $grabMsg) == 1) {
                $I->see('Thank you! You are already subscribed to this product.', '//ul[@class="messages"]');
            } else {
                $I->see('Alert subscription has been saved.', '//ul[@class="messages"]');
            }
        }
    }



        public function checkSelectSizeForTops()
        {
            $I = $this;

            $I->checkTops();
            $I->checkInRandomOrder();

            $size = count($I->grabMultiple('//dd[@class="last"]/div/select/option'));
            $type = count($I->grabMultiple('//*[@id="product-options-left"]/dl/dd/div/select/option'));
            $union = count($I->grabMultiple('//select[@id="hemming-req-select"]/option'));
            $sub = count($I->grabMultiple('//div[@class="amxnotif-block"]/button'));

            if ($union < 1) {

                $I->click('//dd[@class="last"]/div/select/option');
                $I->waitForElementVisible('//dd[@class="last"]/div/select/option[2]');
                $I->click('//dd[@class="last"]/div/select/option[2]');
                $I->moduleSize();

            } else {

                $I->click('//div[@class="amxnotif-block"]/button');
                $I->seeElement('div.validation-advice');
                $I->fillField('//input[@name="guest_email"]', 'johndoe@domain.com');
                $I->click('//div[@class="amxnotif-block"]/button');
                $grabMsg = $I->grabTextFrom('//ul[@class="messages"]');
                if (preg_match('/Thank you! You are already subscribed to this product./i', $grabMsg) == 1) {
                    $I->see('Thank you! You are already subscribed to this product.', '//ul[@class="messages"]');
                } else {
                    $I->see('Alert subscription has been saved.', '//ul[@class="messages"]');
                }
            }
        }

























































    }