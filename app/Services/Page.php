<?php

namespace App\Services;

class Page
{
    public static function part($partName){
        require_once 'views/components/' . $partName . '.php';
    }
}