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

            $sql_insert = "INSERT INTO jelszo_helyreallitas VALUES(?, ?, ?)";
            
            $stmt_update = $connection->prepare($sql_insert);
            $stmt_update->bindParam(1, $userdata["email"]);
            $stmt_update->bindParam(2, $key);
            $stmt_update->bindParam(3, $expires_at);

            if($stmt->execute()){
                Message::success('Üzenet kiküldve a megadott email címre!');
            }else{
                Message::error('Hiba történt a művelet közben!');
            }
        }

        return false;
    }
}