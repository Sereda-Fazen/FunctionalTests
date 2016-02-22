<?php
use Step\Acceptance;

/**
 * @group 8_shopping_cart
 */

class MyShoppingCartCest
{

    /**
     * Check Product Item For Example (tops)
     * @param  \Step\Acceptance\MyShoppingCartSteps $I
     */

    function checkAddToMyCart(\Step\Acceptance\MyShoppingCartSteps $I)
    {
        $I->checkFunctionalInRandomOrder();

    }

    function checkFunctionalForSecondItemShoppingCart(\Page\MyShoppingCart $shoppingPage, \Step\Acceptance\MyShoppingCartSteps $I)
    {
        $I->checkFunctionalInRandomOrder();

    }
























}
