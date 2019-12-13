<?php
session_start();
define('APP_MODE', 'DEBUG');

include_once 'config.php';
include_once 'functions.php';

$page = isset($_GET["p"]) ? $_GET["p"] : "home";

$db = db_connect();

$userdata = isset($_SESSION["userid"]) ? get_user_data($_SESSION["userid"]) : null;

if(file_exists("views/{$page}.php")){
    include_once "views/{$page}.php";
}else{
    include_once "views/404.php";
}