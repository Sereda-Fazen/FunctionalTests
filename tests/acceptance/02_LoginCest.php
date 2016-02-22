<?php
use Step\Acceptance;
/**
 * @group 1_account
 */
class LoginCest
{
        function loginSuccess(Step\Acceptance\Steps $I, \Page\Login $loginPage) {
            $loginPage->login('dev.denimio@yahoo.com', '123456');
            $I->see('From your My Account Dashboard you have the ability to view','div.welcome-msg');
            $loginPage->logout();
        }

        function loginEmptyFields(AcceptanceTester $I, \Page\Login $loginPage) {
            $loginPage->login('', '');
            $I->see( 'This is a required field.','#advice-required-entry-pass');
            $I->comment('Expected result: This is a required field pass and email.');
        }

        function loginEmptyPass(AcceptanceTester $I, \Page\Login $loginPage) {
            $loginPage->login('test@test.org', '');
            $I->see( 'This is a required field.','#advice-required-entry-pass');
            $I->comment('Expected result: This is a required field pass.');
        }

        function loginEmptyEmail(AcceptanceTester $I, \Page\Login $loginPage) {
            $loginPage->login('', '123456');
            $I->see( 'This is a required field.','#advice-required-entry-email');
            $I->comment('Expected result: This is a required field email.');
        }

        function loginInvalidEmail(AcceptanceTester $I, \Page\Login $loginPage) {
            $loginPage->login('testemail.com', '123456');
            $I->see('Please enter a valid email address. For example johndoe@domain.com.', '#advice-validate-email-email');
            $I->comment('Expected result: Please enter a valid email address.');
        }

        function loginWrongEmail(AcceptanceTester $I, \Page\Login $loginPage) {
            $loginPage->login('test@test.com', '123456');
            $I->see('Invalid login or password.', 'li.error-msg');
            $I->comment('Expected result: Please enter a valid email address.');
        }







}
