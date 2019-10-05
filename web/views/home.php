<?php
if(Session::isset('userid')){
    // include dashboard
    include_once 'dashboard.php';
}else{
    Redirect::to('login');
}