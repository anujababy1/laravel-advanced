<?php 
namespace App;
class Postcard {

    protected static function resolveFacade($name){
        return app()[$name];
    }

    
    public static function __callStatic($method,$argumets){

        return (self::resolveFacade('Postcard'))->$method(...$argumets);
    }

}