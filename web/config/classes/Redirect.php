<?php
class Redirect{

    public static function to($url){
        if(file_exists("views/{$url}.php")){
            header("Location: ?p={$url}");
        }else{
            include_once "views/404.php";
        }
    }
}