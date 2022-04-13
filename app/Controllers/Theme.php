<?php

namespace App\Controllers;
use App\Services\Router;
use App\Services\ValidationCheck;

class Theme
{



    public function addingTheme($data){
       $name = ValidationCheck::protectionAgainstXss($data['name']);
       $description =  ValidationCheck::protectionAgainstXss($data['description']);
       $themes = \R::dispense('themes');
       $themes->name = $name;
       $themes->description = $description;
       $themes->checkimoder = 0; //0 - неизвестно 1 - одобренно 2 отклонено

        \R::store($themes);

        Router::redirect('/theme');
    }

}