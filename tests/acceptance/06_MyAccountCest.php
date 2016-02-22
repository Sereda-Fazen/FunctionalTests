<?php
use Step\Acceptance;
/**
 * @group 6_myAccount
 */
class MyAccountCest
{

    function MyAccountDashboard(\Step\Acceptance\LoginSteps $I, \Page\MyAccount $myAccountPage)
    {
        $I->login();
        $myAccountPage->accountDashboard();

    }
    function MyAccountInfo(\Step\Acceptance\LoginSteps $I, \Page\MyAccount $myAccountPage)
    {
        $I->login();
        $myAccountPage->accountInfo('', '', '', '', '', '');
        $I->see('This is a required field.', '#advice-required-entry-email');
        $myAccountPage->accountInfo('alex', 'sereda', 'dev.denimio@yahoo.com', '123456', '123456', '123456');
        $I->see('The account information has been saved.', 'li.success-msg');
    }

    function MyAddress(\Step\Acceptance\LoginSteps $I, \Page\MyAccount $MyAccountPage)
    {
        $I->login();
        $MyAccountPage->accountAddress('alex', 'sereda', '+39063636369', 'Test12', 'Kharkov', '54423', 'Kharkov');
        $I->waitForElement('li.success-msg');
        $I->comment('Expected result: The address has been saved.');
        $I->waitAlertWindow();
        $I->comment('Expected result: The address has been deleted.');
        $MyAccountPage->accountAddress('alex', 'sereda', '+39063636369', 'Test12', 'Kharkov', '54423', 'Kharkov');
        $I->waitForElement('li.success-msg');
        $I->comment('Expected result: The address has been saved.');
    }

    function MyOrders(Step\Acceptance\LoginSteps $I, \Page\MyAccount $MyAccountPage) {
        $I->login();
        $MyAccountPage->accountMyOrders();
        $I->getVisibleText('You have placed no orders.');
    }

    function MyReviewsProduct(Step\Acceptance\LoginSteps $I, \Page\MyAccount $MyAccountPage) {
        $I->login();
        $MyAccountPage->accountProductReviews();
        $I->getVisibleText('You have submitted no reviews.');
        $MyAccountPage->back();
    }

    function MyTags(Step\Acceptance\LoginSteps $I, \Page\MyAccount $MyAccountPage) {
        $I->login();
        $MyAccountPage->accountMyTags();
        $I->getVisibleText('You have not tagged any products yet.');
        $MyAccountPage->back();
    }

    function MyWishList(Step\Acceptance\LoginSteps $I, \Page\MyAccount $MyAccountPage) {
        $I->login();
        $MyAccountPage->accountMyWishList();
        $I->getVisibleText('You have no items in your wishlist.');
        $MyAccountPage->back();
    }

    function MyNewsletter(Step\Acceptance\LoginSteps $I, \Page\MyAccount $MyAccountPage)
    {
        $I->login();
        $MyAccountPage->accountNewsletterSave();
        $I->see('The subscription has been saved.', 'li.success-msg');
        $MyAccountPage->accountNewsletterDelete();
        $I->see('The subscription has been removed.', 'li.success-msg');
        $MyAccountPage->accountNewsletterDefault();
        $I->see('The subscription has been saved.', 'li.success-msg');
    }

    function MyOutOfStock(Step\Acceptance\LoginSteps $I, \Page\MyAccount $MyAccountPage)
    {
        $I->login();
        $MyAccountPage->accountMyOutStock();
        $I->getVisibleText('There are no active subscriptions.');
        $MyAccountPage->back();
    }

    function MyPrice(Step\Acceptance\LoginSteps $I, \Page\MyAccount $MyAccountPage)
    {
        $I->login();
        $MyAccountPage->accountMyPrice();
        $I->getVisibleText('There are no active subscriptions.');
        $MyAccountPage->back();
    }

    function MyContestsXX012(Step\Acceptance\LoginSteps $I, \Page\MyAccount $MyAccountPage)
    {
        $I->login();
        $MyAccountPage->accountXX012ContestDelete();
        $I->see('Your XX012 Contest account was successfully deleted', 'li.success-msg');

        $MyAccountPage->accountXX012ContestAdd();
        $I->getVisibleText('Click Browse and choose a file from your computer to upload.');

    }

    function MyAccountGiftCard(Step\Acceptance\LoginSteps $I, \Page\MyAccount $MyAccountPage)
    {
        $I->login();
        $MyAccountPage->accountGiftCard();

        $MyAccountPage->accountGiftCardIsNot('GIFT-ADFA-12NF0O');
        $I->see('The gift code usage has exceeded the number of users allowed.', 'li.error-msg');

        $I->giftCardEmpty();
        $I->getVisibleText('The maximum number of times to enter gift card code is 10!', '.error-msg');

    }
    function MyRewardsPoint(Step\Acceptance\LoginSteps $I, \Page\MyAccount $MyAccountPage)
    {
        $I->login();
        $MyAccountPage->accountMyRewards();

    }

    function MyTickets(Step\Acceptance\LoginSteps $I, \Page\MyAccount $MyAccountPage)
    {
        $I->login();
        $MyAccountPage->accountMyTickets();

    }













}