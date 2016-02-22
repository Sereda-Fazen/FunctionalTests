<?php
use Step\Acceptance;

/**
 * @group 8_product
 */

class ProductCest
{


    /**
     * Check Picture And Prev View And Zoom
     * @param \Page\Product $productPage
     * @param Acceptance\ProductSteps $I
     */

    function checkPictureArrows(\Page\Product $productPage, \Step\Acceptance\ProductSteps $I)
    {
        $I->checkInRandomOrder();
        $I->checkPictureArrows();
    }

    function checkPictureAndZoom(\Page\Product $productPage, \Step\Acceptance\ProductSteps $I)
    {
        $I->checkInRandomOrder();
        $I->checkPictureAndZoom();
    }


    /**
     * Check Review
     * @param \Page\Product $productPage
     */

    function checkMainBlockReview(\Page\Product $productPage)
    {
        $productPage->checkMainBlockReview('name','test','test');
    }

    /**
     * Check Description, Shipping, Details, Returns
     * @param \Page\Product $productPage
     * @param \Step\Acceptance\ProductSteps
     */

    function checkMainLinks(\Page\Product $productPage, \Step\Acceptance\ProductSteps $I)
    {
        $I->checkInRandomOrder();
        $I->checkLinksForItem();
    }

    /**
     * Check Select Size
     * @param \Page\Product $productPage
     * @param \Step\Acceptance\ProductSteps
     */

    function checkLinksForItem(\Page\Product $productPage)
    {
        $productPage->checkShareLinks();
    }

    function checkSelectSizeForTops(\Page\Product $productPage, \Step\Acceptance\ProductSteps $I)
    {
        $I->checkSelectSizeForTops();
    }

    function checkSelectSizeForBottoms(\Page\Product $productPage, \Step\Acceptance\ProductSteps $I)
    {
        $I->checkSelectSizeForBottoms();
    }























}
