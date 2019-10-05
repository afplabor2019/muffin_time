<?php
class Message{
    public static function success($message){
        echo 
        "
        <div class='alert alert-success'>
            <b>Siker: </b> {$message}
        </div>
        ";
    }

    public static function error($message){
        echo 
        "
        <div class='alert alert-danger'>
            <b>Hiba: </b> {$message}
        </div>
        ";
    }
    
}