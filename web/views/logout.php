<?php
include_once 'config/init.php';

if(Session::isset('userid')){
    session_destroy();
    unset($_SESSION['userid']);
    Redirect::to('login');
}else{
    Redirect::to('home');
}
