<?php

namespace App\Services;

class ValidationCheck
{



    public static function checkImg($imgName){

        $checkMark = false;
        $formats = require_once 'config/imgFormats.php';

        foreach ($formats as $format){
            if(substr($imgName, -3) === $format){
               $checkMark = true;
           }
        }

        return $checkMark;
    }

    public static function protectionAgainstXss($str){
       return strip_tags(trim($str));
    }
}