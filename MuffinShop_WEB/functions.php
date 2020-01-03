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

function place_order($userid, $order_date, $delivery_mode, $payment_method, $total, $comment){
    global $db;
    
    $delivery = $delivery_mode == "personal" ? 1 : 2;
    $payment = $payment_method == "cash" ? 1 : 2;

    $sql = $db->prepare("INSERT INTO orders (user_id, order_date, delivery_mode, payment_method, total) VALUES(?,?,?,?,?)");

    $sql->bind_param("isiii", $userid, $order_date, $delivery, $payment, $total);

    if($sql->execute()){
        foreach(array_unique($_SESSION['cart']) as $cart_item){
            $product = get_muffin_by_id($cart_item);
            $product_qty = count(array_keys($_SESSION["cart"], $product["muffin_id"]));
            insert_order_details($sql->insert_id, $product["muffin_id"], $product_qty, $comment);
        }

        return true;
    }

    return false;
}

function insert_order_details($order_id, $product_id, $qty, $comment){
    global $db;

    $sql = $db->prepare("INSERT INTO order_details (order_id, product_id, qty, comment) VALUES(?,?,?,?)");

    $sql->bind_param("iiis", $order_id, $product_id, $qty, $comment);

    return $sql->execute();
}

function get_user_order_history($userid){
    global $db;

    $sql = $db->prepare("SELECT order_id, order_date, total FROM orders WHERE user_id = ? ORDER BY order_date DESC");
    $sql->bind_param("i", $userid);

    $sql->execute();

    $result = $sql->get_result();

    return $result;
}

function get_user_order_by_id($userid, $order_id){
    global $db;
    
    $sql = $db->prepare("SELECT o.order_id, o.order_date, o.delivery_mode, o.payment_method, o.total, od.product_id, od.qty, od.comment FROM orders o INNER JOIN order_details od ON o.order_id = od.order_id WHERE o.order_id = ? AND o.user_id = ?");

    $sql->bind_param("ii", $order_id, $userid);

    $sql->execute();

    $result = $sql->get_result();
    return $result;

}

function filter_muffins($price_array){
    global $db;

    if(is_array($price_array)){
        $min_price = $price_array["min_price"];
        $max_price = $price_array["max_price"];

        if($min_price != null && $max_price != null){
            $sql = $db->prepare("SELECT * FROM muffins WHERE muffin_price >= ? AND muffin_price <= ?");
            $sql->bind_param("ii", $min_price, $max_price);
            $sql->execute();

            $result = $sql->get_result();

            return $result;
        }else{
            if($min_price == null){
                $sql = $db->prepare("SELECT * FROM muffins WHERE muffin_price <= ?");
                $sql->bind_param("i", $max_price);
                $sql->execute();
                $result = $sql->get_result();

                return $result;
            }
            if($max_price == null){
                $sql = $db->prepare("SELECT * FROM muffins WHERE muffin_price >= ?");
                $sql->bind_param("i", $min_price);
                $sql->execute();

                $result = $sql->get_result();

                return $result;
            }
        }
        return null;
    }

    return null;
}

function add_qty_to_cart($product_id){
    if(existing_product($product_id)){
        array_push($_SESSION['cart'], $product_id);
    }
}

function remove_qty_from_cart($product_id){
    if (($key = array_search($product_id, $_SESSION['cart'])) !== false) {
        unset($_SESSION['cart'][$key]);
    }
}

function existing_product($product_id){
    global $db;

    $sql = $db->prepare("SELECT * FROM muffins WHERE muffin_id = ?");
    $sql->bind_param("i",$product_id);

    $sql->execute();

    $result = $sql->get_result();

    return $result->num_rows > 0;
}

function get_delivery_name($delivery_id){
    global $db;

    $sql = $db->prepare("SELECT delivery_name FROM delivery WHERE delivery_id = ?");
    $sql->bind_param("i", $delivery_id);
    $sql->execute();

    $result = $sql->get_result()->fetch_assoc();

    return $result;
}

function get_payment_name($payment_id){
    global $db;

    $sql = $db->prepare("SELECT payment_method FROM payment WHERE payment_id = ?");
    $sql->bind_param("i", $payment_id);
    $sql->execute();

    $result = $sql->get_result()->fetch_assoc();

    return $result;
}

function insert_muffin($muffin_name, $muffin_description, $muffin_price){
    global $db;

    $sql = $db->prepare("INSERT INTO muffins (muffin_name, muffin_description, muffin_price) VALUES(?,?,?)");
    $sql->bind_param("ssi", $muffin_name, $muffin_description, $muffin_price);
    
    return $sql->execute();
}

function update_muffin($muffin_id, $muffin_name, $muffin_description, $muffin_price){
    global $db;

    $sql = $db->prepare("UPDATE muffins SET muffin_name = ?, muffin_description = ?, muffin_price = ? WHERE muffin_id = ?");
    $sql->bind_param("ssii", $muffin_name, $muffin_description, $muffin_price, $muffin_id);
    
    $sql->execute();

    return $sql->affected_rows > 0;
}

function delete_muffin($muffin_id){
    global $db;

    $sql = $db->prepare("DELETE FROM muffins WHERE muffin_id = ?");
    $sql->bind_param("i", $muffin_id);

    return $sql->execute();
}