<?php

class FuncLoginCest
{
        function loginSuccess(\Page\Login $loginPage) {
            $loginPage->loginFunc('dev.denimio@yahoo.com', '123456');
           // $loginPage->logout();
        }

}
