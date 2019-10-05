<?php
class User{
    public static function fetchData($userid){
        $db = new Database();
        $connection = $db->getConnection();

        $sql = "SELECT * FROM felhasznalok WHERE id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(1, $userid);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $userdata = $stmt->fetch(PDO::FETCH_ASSOC);
            return $userdata;
        }

        return false;
    }

    public static function lostPassGenerate($useremail){
        $db = new Database();
        $connection = $db->getConnection();

        $sql = "SELECT * FROM felhasznalok WHERE email = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(1, $useremail);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $userdata = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $key = md5(rand(999,99999));
            $expires_at = date("Y-m-d H:i:s",time()+60*60);

            $sql_insert = "INSERT INTO jelszo_helyreallitas VALUES(:email, :key, :expires)";
            
            $stmt_update = $connection->prepare($sql_insert);
            $stmt_update->bindParam(':email', $userdata["email"]);
            $stmt_update->bindParam(':key', $key);
            $stmt_update->bindParam(':expires', $expires_at);
            $result = $stmt_update->execute();
            if($result){
                $url = "?p=reset_pass&email={$userdata['email']}&key={$key}";
                Message::success("Jelszó helyreállító link (1 órán át használható): <a href='{$url}' class='white-link'>Kattints ide</a>");
            }else{
                Message::error('Hiba történt a művelet közben!');
            }
        }else{
            Message::error('Ilyen email cím nem található az adatbázisban!');
        }
    }

    public static function isAdmin($userid){
        $db = new Database();
        $connection = $db->getConnection();

        $sql = "SELECT jogosultsag FROM felhasznalok WHERE id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(1, $userid);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return ($data["jogosultsag"] == "admin") ? true : false;
        }
        return false;
    }

    public static function getAllUser(){
        $db = new Database();
        $connection = $db->getConnection();

        $sql = "SELECT * FROM felhasznalok";
        $stmt = $connection->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}