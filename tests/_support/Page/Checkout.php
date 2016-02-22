<?php
namespace Page;

class Checkout
{

    protected $tester;

    public function __construct(\AcceptanceTester $I) {
        $this->tester = $I;
    }



}