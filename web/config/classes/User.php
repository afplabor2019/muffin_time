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

    public static function create($username,$password1,$password2,$email,$role){
        $db = new Database();
        $connection = $db->getConnection();

        if($password1 != $password2){
            Message::error('A két jelszó nem egyezik meg!');
        }else{
            $check_username_sql = "SELECT felhasznalonev FROM felhasznalok WHERE felhasznalonev = ?";
            $check_username_stmt = $connection->prepare($check_username_sql);
            $check_username_stmt->bindParam(1, $username);
            $check_username_stmt->execute();
            if($check_username_stmt->rowCount() > 0){
                Message::error('Foglalt felhasználónév!');
            }else{
                $check_email_sql = "SELECT email FROM felhasznalok WHERE email = ?";
                $check_email_stmt = $connection->prepare($check_email_sql);
                $check_email_stmt->bindParam(1, $email);
                $check_email_stmt->execute();
                if($check_email_stmt->rowCount() > 0){
                    Message::error('Ezzel az email címmel már regisztráltak!');
                }else{
                    $jelszo_hash = password_hash($password1, PASSWORD_DEFAULT);
                    $insert_user_sql = "INSERT INTO felhasznalok (felhasznalonev, jelszo, email, jogosultsag) VALUES(:felhasznalonev, :jelszo, :email, :jogosultsag)";
                    $insert_user_stmt = $connection->prepare($insert_user_sql);
                    $insert_user_stmt->bindParam(':felhasznalonev', $username);
                    $insert_user_stmt->bindParam(':jelszo', $jelszo_hash);
                    $insert_user_stmt->bindParam(':email', $email);
                    $insert_user_stmt->bindParam(':jogosultsag', $role);

                    if($insert_user_stmt->execute()){
                        Message::success('Sikeres felhasználó létrehozás!');
                    }else{
                        Message::error('Hiba történt a felhasználó létrehozása közben!');
                    }
                }
            }
        }
    }
}