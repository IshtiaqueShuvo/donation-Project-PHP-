<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 20-11-17
 * Time: 22.56
 */

namespace App\Utility;


class Utility
{
    public static function var_dump($dataForDumped){
        echo "<pre>";
        var_dump($dataForDumped);
        echo "<pre>";
    }

    public static function redirect($location){
        header('location:'.$location);
    }
}