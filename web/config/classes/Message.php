<?php
class Message{
    public static function error($message){
        echo 
        "
        <div class='alert alert-danger'>
            <b>Hiba: </b> {$message}
        </div>
        ";
    }
    
}