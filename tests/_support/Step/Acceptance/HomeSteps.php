<?php
namespace Step\Acceptance;

class HomeSteps extends \AcceptanceTester
{

    public function getCurrency()
    {
        $I = $this;
        $seeCurr = '//div[@class="top-cart-title"]';
        $countCurrency = count($I->grabMultiple('//*[@class="sub-currency"]/li'));
        for ($c = 1; $c <= $countCurrency; $c++) {
            $I->wait(1);
            $I->moveMouseOver('li.currency-trigger > a');
            $I->click('//ul[@class="sub-currency"]/li[' . $c . ']/a');
            $I->grabTextFrom('//ul[@class="sub-currency"]/li[' . $c . ']/a');

            switch ($c) {


                case 1:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('AU');
                    $I->see('AU', $seeCurr);
                    break;

                case 2:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('R');
                    $I->see('R', $seeCurr);
                    break;

                case 3:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('£');
                    $I->see('£', $seeCurr);
                    break;

                case 4:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('CA$');
                    $I->see('CA$', $seeCurr);
                    break;

                case 5:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('CN¥');
                    $I->see('CN¥', $seeCurr);
                    break;

                case 6:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('Dkr');
                    $I->see('Dkr', $seeCurr);
                    break;

                case 7:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('€');
                    $I->see('€', $seeCurr);
                    break;

                case 8:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('HK$');
                    $I->see('HK$', $seeCurr);
                    break;

                case 9:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('Rs0');
                    $I->see('Rs0', $seeCurr);
                    break;

                case 10:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('Rp');
                    $I->see('Rp', $seeCurr);
                    break;

                case 11:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('¥');
                    $I->see('¥', $seeCurr);
                    break;

                case 12:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('RM');
                    $I->see('RM', $seeCurr);
                    break;

                case 13:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('MXN');
                    $I->see('MXN', $seeCurr);
                    break;

                case 14:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('NZ');
                    $I->see('NZ', $seeCurr);
                    break;

                case 15:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('Nkr');
                    $I->see('Nkr', $seeCurr);
                    break;

                case 16:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('₱');
                    $I->see('₱', $seeCurr);
                    break;

                case 17:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('RON');
                    $I->see('RON', $seeCurr);
                    break;


                case 18:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('RUB0');
                    $I->see('RUB0', $seeCurr);
                    break;


                case 19:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('S$0');
                    $I->see('S$0', $seeCurr);
                    break;


                case 20:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('R0');
                    $I->see('R0', $seeCurr);
                    break;


                case 21:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('₩0');
                    $I->see('₩0', $seeCurr);
                    break;

                case 22:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('Skr');
                    $I->see('Skr', $seeCurr);
                    break;

                case 23:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('Fr');
                    $I->see('Fr.', $seeCurr);
                    break;

                case 24:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('฿0');
                    $I->see('฿0', $seeCurr);
                    break;

                case 25:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('$');
                    $I->see('$', $seeCurr);
                    break;

            }

        }


    }

    public function getLanguage()
    {
        $I = $this;
        $seeLanguage = 'a.login_click';
        $countLanguage = count($I->grabMultiple('//*[@class="sub-lang"]/li'));
        for ($l = 1; $l <= $countLanguage; $l++) {
            $I->moveMouseOver('//i[@class="fa fa-caret-down"]');
            $I->click('//*[@class="sub-lang"]/li['.$l.']');
            $I->grabTextFrom('//*[@class="sub-lang"]/li['.$l.']');

            switch ($l) {

                case 1:
                    echo $I->see('Log In', $seeLanguage);
                    break;

                case 2:
                    echo $I->see('Log In', $seeLanguage);
                    break;

                case 3:
                    echo $I->see('เข้าสู่ระบบ', $seeLanguage);
                    break;

                case 4:
                    echo $I->see('ログイン', $seeLanguage);
                    break;

                case 5:
                    echo $I->see('登录', $seeLanguage);
                    break;

                case 6:
                    echo $I->see('로그인', $seeLanguage);
                    break;

                case 7:
                    echo $I->see('Log Masuk', $seeLanguage);
                    break;

                case 8:
                    echo $I->see('Войти', $seeLanguage);
                    break;

                case 9:
                    echo $I->see('Connexion', $seeLanguage);
                    break;

                case 10:
                    echo $I->see('Anmelden', $seeLanguage);
                    break;

                case 11:
                    echo $I->see('Accedi', $seeLanguage);
                    break;

                case 12:
                    echo $I->see('Entrar', $seeLanguage);
                    break;

                case 13:
                    echo $I->see('Inicio De Sesión', $seeLanguage);
                    break;

                case 14:
                    echo $I->see('Log In', $seeLanguage);
                    break;

            }

        }
        $I->moveMouseOver('//i[@class="fa fa-caret-down"]');
        $I->click('//*[@class="sub-lang"]/li[1]');


    }

    public function getHeaderLinks(){
        $I = $this;
        $links = count($I->grabMultiple('//*[@id="menu_link"]/li'));
        for ($menu = 1; $menu <= $links; $menu++){
            $I->moveMouseOver('a.login_click > i.fa.fa-caret-down');
            $I->click('//*[@id="menu_link"]/li['.$menu.']/a');

        }
        $I->click('a.logo > img');
    }

    public function getWrongSearch(){
        $I = $this;
        $I->fillField('#search','wrong');
        $I->click('i.fa.fa-search');
        $I->see('Your search returns no results.','p.note-msg');
    }
    public function getSearchOnCategory(){
        $I = $this;
        $I->fillField('#search','jeans');
        $cat =  count($I->grabMultiple('//*[@id = "cat"]/option'));
        for ($c = 2; $c <= $cat; $c++) {
            $I->click('#cat');
            $I->click('//*[@id = "cat"]/option['.$c.']');
            $I->click('i.fa.fa-search');
            $I->seeElement('span.value');
        }

    }

    public function getSubcategoryTops(){
        $I = $this;

        $sub =  count($I->grabMultiple('//*[@id="block112"]/div/div/a'));
        for ($s = 1; $s <= $sub; $s++) {
            $I->moveMouseOver('//*[@class="parentMenu"]');
            $I->waitForElementVisible('//*[@class="itemMenu level1"]');
            $I->click('//*[@class="itemMenu level1"]/a['.$s.']');
            $I->seeElement('div.breadcrumbs > ul > li:nth-of-type(2) > a');
        }
    }
    public function getSubcategoryBottoms()
    {
        $I = $this;
        $sub2 = count($I->grabMultiple('//*[@id="block113"]/div/div/a'));
        for ($b = 1; $b <= $sub2; $b++) {
            $I->moveMouseOver('//*[@id="pt_menu13"]/div[1]/a/span');
            $I->waitForElementVisible('//*[@id="block113"]/div/div/a[5]');
            $I->click('//*[@id="block113"]/div/div/a[' . $b . ']');
            $I->seeElement('div.breadcrumbs > ul > li:nth-of-type(2) > a');
        }
    }

    public function getInformationLinksFooter(){
        $I = $this;
        $I->amOnPage('/customer/account/login/');
        $info = count($I->grabMultiple('//*[@class="footer-static-content row-fluid"]/ul/li/a'));
        for($i = 1; $i <= $info; $i++) {
            $I->scrollDown(1000);
            $I->moveMouseOver('//*[@class="footer-static-content row-fluid"]/ul/li['.$i.']/a');
            $I->click('//*[@class="footer-static-content row-fluid"]/ul/li['.$i.']/a');
        }
    }


    public function getSecondOpen() {
        $I = $this;
        $I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
            $handles = $webdriver->getWindowHandles();
            $last_window = end($handles);
            $webdriver->switchTo()->window($last_window);


        });
    }


    public function getCheckRandomBrands()
    {
        $I = $this;
        $I->amOnPage('/brand/');

        $brands = rand(1, count($I->grabMultiple('//*[@class="products-grid row"]/div')));
        $I->click('//*[@class="products-grid row"]/div['.$brands.']');
        $I->seeElement('li.view > strong');
        $I->scrollDown(150);
        $I->seeElement('div.category-products');
    }


    public function getCheckFeaturedBrands()
    {
        $I = $this;
        $I->amOnPage('/');

        $featured = count($I->grabMultiple('//*[@id="featured-brands"]/div[1]/div'));
        for ($f = 1; $f <= $featured; $f++) {
            $I->moveMouseOver('//*[@id="featured-brands"]/div[1]/div['.$f.']');
            $I->wait(1);
            $I->see('SHOP ALL' ,'//*[@class="brand-overlay"]/span');
        }

        $featured2 = count($I->grabMultiple('//div[2][@class="row"]/div'));
        for ($fb = 1; $fb <= $featured2; $fb++) {
            $I->moveMouseOver('//div[2][@class="row"]/div['.$fb.']');
            $I->wait(1);
            $I->see('SHOP ALL' ,'//*[@class="brand-overlay"]/span');
        }

        $I->moveMouseOver('//*[@id="featured-brands"]/div[1]/div[1]');
        $I->click('//*[@class="brand-overlay"]/span');
        $I->see('Brands' ,'//li[@class="brand"]');
        $I->click('//li[@class="home"]');


        $cat = count($I->grabMultiple('//*[@id="featured-brands"]/div[1]/div[1]/div/div/ul/li'));
        for ($c = 1; $c <= $cat; $c++) {
            $I->click('//*[@id="featured-brands"]/div[1]/div[1]/div/div/ul/li['.$c.']/a');

            switch ($c) {

                case 1:
                    echo
                    $I->waitForElement('ul > li:nth-of-type(2) > strong');
                    $I->see('New Arrivals', 'ul > li:nth-of-type(2) > strong');
                    $I->moveBack();
                    break;

                case 2:
                    echo
                    $I->waitForElement('ul > li:nth-of-type(2) > strong');
                    $I->see('Tops','ul > li:nth-of-type(2) > strong');
                    $I->moveBack();
                    break;

                case 3:
                    echo
                    $I->waitForElement('ul > li:nth-of-type(2) > strong');
                    $I->see('Bottoms', 'ul > li:nth-of-type(2) > strong');
                    $I->moveBack();
                    break;

                case 4:
                    echo
                    $I->waitForElement('ul > li:nth-of-type(2) > strong');
                    $I->see('Accessories','ul > li:nth-of-type(2) > strong');
                    $I->moveBack();
                    break;
            }

        }


    }









}