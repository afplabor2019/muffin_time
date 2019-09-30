<?php
class Session{
    public static function set($name, $value){
        $_SESSION[$name] = $value;
    }

    public static function get($name){
        if(isset($_SESSION[$name])){
            return $_SESSION[$name];
        }
    }

    public static function isset($name){
        return isset($_SESSION[$name]);
    }
}