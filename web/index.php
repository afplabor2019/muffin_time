<?php
include_once 'config/init.php';

$page = isset($_GET['p']) ? $_GET['p'] : 'home';

if(file_exists("views/{$page}.php")){
    include_once "views/{$page}.php";
}else{
    include_once "views/404.php";
}
?>