<?php
session_start();

spl_autoload_register(function($name){
    if(file_exists("classes/{$name}.php")){
        require_once "classes/{$name}.php";
    }
});