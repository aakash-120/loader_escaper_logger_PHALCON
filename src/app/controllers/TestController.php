<?php

use Phalcon\Mvc\Controller;

class TestController extends Controller
{
    public function loadertestAction()
    {
        $myescaper = new \App\Components\myescaper();
        echo $myescaper->getCurrentDate();
    }

}