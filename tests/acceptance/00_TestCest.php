<?php
use \Step\Acceptance;

class TestCest {

    /*
        function checkAddToMyCart(\Page\MyShoppingCart $shoppingPage, \Step\Acceptance\MyShoppingCartSteps $I)
        {
           $I->checkFunctionalInRandomOrder();

        }
        */
        function checkMyCartForSecondItem(\Page\MyShoppingCart $shoppingPage, \Step\Acceptance\MyShoppingCartSteps $I)
        {
            $I->checkCouponAndGiftCard();

        }

    function checkEstimateShippingAndTax(\Page\MyShoppingCart $shoppingPage, \Step\Acceptance\MyShoppingCartSteps $I)
    {
        $I->checkEstimateShippingAndTax();

    }
















}
