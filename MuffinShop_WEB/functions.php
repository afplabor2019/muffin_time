<?php if(!defined('APP_MODE')){ exit; } ?>
<?php

function db_connect(){
    $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if($connection->connect_error){
        die("<h1>Hiba az adatbázishoz való kapcsolódás során:</h1> " . $connection->connect_error);
    }

    $connection->set_charset("utf-8");

    return $connection;
}

function db_close(){
    global $db;

    $db->close();
}

function url($page = 'home', $params = []){
    $url = DOMAIN."?p={$page}";
    if(is_array($params)){
        foreach($params as $param => $value){
            $url .= "&$param=$value";
        }
    }

    return $url;
}

function redirect($page = 'home', $params = []){
    $url = url($page, $params);
    header("Location: $url");
    die();
}

function asset($asset){
    return DOMAIN.$asset;
}

function display_errors($key){
    global $errors;

    $html = "";

    if(isset($errors[$key])){
        foreach($errors[$key] as $error){
            $html .= "<div class='alert alert-danger mt-2'>$error</div>";
        }
    }

    return $html;
}

function display_success($message){
    $html = "";
    $html .= "<div class='alert alert-success'>$message</div>";

    return $html;
}

function display_error($message){
    $html = "";
    $html .= "<div class='alert alert-danger'>$message</div>";

    return $html;
}

function get_all_muffins(){
    global $db;

    $sql = $db->prepare("SELECT * FROM muffins");
    $sql->execute();

    $result = $sql->get_result();

    return $result;
}

function check_username($username){
    global $db;

    $sql = $db->prepare("SELECT * FROM users WHERE username = ?");
    $sql->bind_param("s", $username);
    $sql->execute();

    $result = $sql->get_result();

    return $result->num_rows > 0;
}
function check_email($email){
    global $db;

    $sql = $db->prepare("SELECT email FROM users WHERE email = ?");
    $sql->bind_param("s", $email);
    $sql->execute();

    $result = $sql->get_result();
    
    return $result->num_rows > 0;
}

function register_user($felhasznalonev, $email, $jelszo){
    global $db;

    $jelszo_hash = password_hash($jelszo, PASSWORD_DEFAULT);
    $sql = $db->prepare("INSERT INTO users (username, email, password, last_login) VALUES(?,?,?,null)");

    $sql->bind_param("sss", $felhasznalonev, $email, $jelszo_hash);
    
    return $sql->execute();
}

function login_user($email, $jelszo){
    global $db;

    $sql = $db->prepare("SELECT * FROM users WHERE email = ?");
    $sql->bind_param("s", $email);
    $sql->execute();

    $result = $sql->get_result()->fetch_assoc();

    if(password_verify($jelszo, $result["password"])){
        $_SESSION["userid"] = $result["user_id"];
        return true;
    }else{
        return false;
    }
}

function get_user_data($userid){
    global $db;

    $sql = $db->prepare("SELECT * FROM users WHERE user_id = ?");
    $sql->bind_param("i", $userid);
    $sql->execute();

    $result = $sql->get_result()->fetch_assoc();

    return $result;
}

function logged_in(){
    return isset($_SESSION["userid"]);
}

function change_user_password($userid, $new){
    global $db;

    $password_hashed = password_hash($new, PASSWORD_DEFAULT);

    $sql = $db->prepare("UPDATE users SET password = ? WHERE user_id = ?");
    $sql->bind_param("si", $password_hashed, $userid);
    $sql->execute();

    return $sql->affected_rows > 0;
}

function check_existing_user_address($userid){
    global $db;

    $sql = $db->prepare("SELECT * FROM users_data WHERE user_id = ?");
    $sql->bind_param("i", $userid);
    $sql->execute();

    $result = $sql->get_result();

    return $result->num_rows > 0;
}

function change_user_address($userid, $params = []){
    global $db;

    if(is_array($params)){
        if(count($params) == 4){
            if(check_existing_user_address($userid)){
                $sql = $db->prepare("UPDATE users_data SET zip = ?, city = ?, address = ?, extra = '', phone = ? WHERE user_id = ?");
                $sql->bind_param("ssssi", $params["zip"], $params["city"], $params["address"], $params["phone"], $userid);

                return $sql->execute();
            }else{
                $sql = $db->prepare("INSERT INTO users_data (user_id,zip,city,address,extra,phone) VALUES(?,?,?,?,'',?)");
                $sql->bind_param("ssssi", $userid, $params["zip"], $params["city"], $params["address"], $params["phone"]);

                return $sql->execute();
            }
        }
        else if(count($params) == 5){
            if(check_existing_user_address($userid)){
                $sql = $db->prepare("UPDATE users_data SET zip = ?, city = ?, address = ?, extra = ?, phone = ? WHERE user_id = ?");
                $sql->bind_param("sssssi", $params["zip"], $params["city"], $params["address"], $params["floor"], $params["phone"], $userid);

                

                return $sql->execute();
            }else{
                $sql = $db->prepare("INSERT INTO users_data (user_id,zip,city,address,extra,phone) VALUES(?,?,?,?,?,?)");
                $sql->bind_param("isssss", $userid, $params["zip"], $params["city"], $params["address"], $params["floor"], $params["phone"]);

                return $sql->execute();
            }
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function get_user_address($userid){
    global $db;
    $data = [];

    if(check_existing_user_address($userid)){

         $sql = $db->prepare("SELECT zip,city,address,extra,phone FROM users_data WHERE user_id = ?");
         $sql->bind_param("i", $userid);
         $sql->execute();

         $result = $sql->get_result();

         if($result->num_rows > 0){
             $data = $result->fetch_assoc();
         }
    }

    return $data;
}

function get_muffin_by_id($muffin_id){
    global $db;

    $sql = $db->prepare("SELECT * FROM muffins WHERE muffin_id = ?");
    $sql->bind_param("i", $muffin_id);
    $sql->execute();

    $result = $sql->get_result()->fetch_assoc();

    return $result;
}