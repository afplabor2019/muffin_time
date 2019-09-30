<?php
if(Session::isset('userid')){
    // include dashboard
}else{
    Redirect::to('login');
}