<?php
if(!defined("APP_MODE")){ exit; }
if(isset($_SESSION["userid"])){
    session_destroy();
    session_unset();
    redirect('home');
}else{
    redirect('login');
}