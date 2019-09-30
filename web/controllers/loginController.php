<?php
include_once '../config/init.php';

if(isset($_POST["login_submit"])){
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    $db = new Database();
    $connection = $db->getConnection();

    $sql = "SELECT * FROM felhasznalok WHERE felhasznalonev = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(1, $username);
    $stmt->execute();

    if($stmt->rowCount() > 0){
        $userdata = $stmt->fetch(PDO::FETCH_ASSOC);
        if(password_verify($password, $userdata["jelszo"])){
            // sikeres belépés
            // TODO: set Session
            // TODO: redirect home
        }else{
            // sikertelen belépés
            // TODO: redirect login
        }
    }
}