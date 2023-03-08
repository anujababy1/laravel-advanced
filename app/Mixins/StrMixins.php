<?php
namespace App\Mixins;

class StrMixins {
    public function formatPhoneNumber(){

        return function ($number){
            return '+11 ('.substr($number,0,3).')-'.substr($number,3,3).'-'.substr($number,6);
        };
    }
}