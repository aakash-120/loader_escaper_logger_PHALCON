<?php

namespace App\Components;

use Phalcon\Escaper;

class myescaper
{
    public function sanitize($name, $email)
    {
        $escaper = new Escaper();
        $name = $escaper->escapeHtml($name);
        $email = $escaper->escapeHtml($email);
        
        $arr = array("username"=> $name, "email"=> $email);
        return $arr;
    }
    public function getCurrentDate()
    {
        return date("y-m-d");
    }
}