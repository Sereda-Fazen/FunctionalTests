<?php
use \Step\Acceptance;
/**
 * @group 1_account
 */
class ForgotPassCest {

    function forgotSuccess(Step\Acceptance\ForgotPassSteps $I, \Page\ForgotPass $forgotPage)
    {
        $forgotPage->forgot('denimio_test@yahoo.com');
    }

    function enterNewPass (Step\Acceptance\ForgotPassSteps $I)
    {
        $I->gMailAuth();
        $I->remoteWindow();
        $I->newPass();
    }


    function deleteOldMsg(Step\Acceptance\LoginSteps $I, Page\ForgotPass $deleteMsg){
        $deleteMsg->deleteMsg();

    }
/*
    function invalidRepeatPass (Step\Acceptance\ForgotPassSteps $I, \Page\ForgotPass $forgotPage) {
        $I->moveBack();
        $I->see('Your password reset link has expired.','li.error-msg');

    }
*/
}
