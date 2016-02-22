<?php
use Step\Acceptance;

/**
 * @group 2_header
 */
class HomePageCest
{

        /**
         * Check MultiCurrency
         * @param Acceptance\HomeSteps $I
         * @param \Page\HomePage $homePage
         */

        function headerCurrencyCheck(Step\Acceptance\HomeSteps $I, \Page\HomePage $homePage){
            $homePage->home();
            $I->getCurrency();
        }

        /**
         * Check MultiLanguage
         * @param Acceptance\HomeSteps $I
         * @param \Page\HomePage $homePage
         */


        function headerLanguageCheck(Step\Acceptance\HomeSteps $I, \Page\HomePage $homePage){
            $homePage->home();
            $I->getLanguage();
        }


        /**
         * Check on invalid address
         * @param Acceptance\LoginSteps $I
         * @param \Page\HomePage $homePage
         */

        function invalidURL(Step\Acceptance\LoginSteps $I, \Page\HomePage $homePage)
        {
            $homePage->home();
            $homePage->invalidURL();
        }

        /**
         * Check Header menu - Log In
         * @param Acceptance\HomeSteps $I
         * @param \Page\HomePage $homePage
         */

        function headerLogInCheckLinksOnHeader(Step\Acceptance\HomeSteps $I,\Page\HomePage $homePage){
           $homePage->home();
           $I->getHeaderLinks();

        }

        /**
         * Check Search
         * @param Acceptance\HomeSteps $I
         * @param \Page\HomePage $homePage
         */

        function headerSearchIsNotResult(Step\Acceptance\HomeSteps $I,\Page\HomePage $homePage){
            $homePage->home();
            $I->getWrongSearch();
        }

        function headerSearchCategory(Step\Acceptance\HomeSteps $I, \Page\HomePage $homePage){
            $homePage->home();
            $I->getSearchOnCategory();
        }

        /**
         * Check Empty Cart
         * @param \Page\HomePage $homePage
         */

        function headerCheckEmptyCart(\Page\HomePage $homePage){
            $homePage->emptyCart();
        }

        /**
         * Check Full Cart
         * @param \Page\HomePage $homePage
         */

        function headerCheckFullCart( \Page\HomePage $homePage){
            $homePage->fullCart();
        }



        /**
         * Footer Links
         * @param \Page\HomePage $homePage
         */

        function footerLinksAccount(\Page\HomePage $homePage){
            $homePage->footerLinksAccount();
        }

        function footerLinksInformation(Step\Acceptance\HomeSteps $I){
            $I->getInformationLinksFooter();
        }

        function footerGetClosers(Step\Acceptance\HomeSteps $I,\Page\HomePage $homePage)
        {

            $homePage->homeFooterFacebook();
            $I->getSecondOpen();

            $homePage->homeFooterTwiter();
            $I->getSecondOpen();
            $homePage->assertCheckTwitter();

            $homePage->homeFooterPinterest();
            $I->getSecondOpen();
            $homePage->assertCheckPinterest();

            $homePage->homeFooterInstagram();
            $I->getSecondOpen();
            $homePage->assertCheckInstagram();
        }



        function footerSubscribe(\Page\HomePage $homePage)
        {
            $homePage->subscribeEmptyField();
            $homePage->subscribeInvalidEmail('123qwerty');
        //    $homePage->subscribeIsNotEmail('dev.denimio@yahoo.com');
            $homePage->subscribeSuccess('johndoe@domain.com');
        }











}
