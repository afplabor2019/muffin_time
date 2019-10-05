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
}