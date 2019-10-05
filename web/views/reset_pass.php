<?php
include_once 'config/init.php';

if(Session::isset('userid')){
    Redirect::to('home');
}

$email = isset($_GET["email"]) ? $_GET["email"] : '';
$key = isset($_GET["key"]) ? $_GET["key"] : '';

if(empty($email) || empty($key)){
    Message::error('Hibás URL');
    die();
}

$db = new Database();
$connection = $db->getConnection();

$sql = "SELECT * FROM jelszo_helyreallitas WHERE email = ? AND kulcs = ?";
$stmt = $connection->prepare($sql);
$stmt->bindParam(1, $email);
$stmt->bindParam(2, $key);
$stmt->execute();
if($stmt->rowCount() > 0){
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    $current_time = time();
    $current_timestamp = date('Y-m-d H:i:s', $current_time);
    if($data["lejar_datum"] > $current_timestamp){
    ?>
        <?php
        if(isset($_POST["reset_submit"])){
            $uj_jelszo = $_POST["uj_jelszo"];
            $megerosites = $_POST["jelszo_megerosites"];

            if($uj_jelszo == $megerosites){
                $uj_jelszo_hash = password_hash($uj_jelszo, PASSWORD_DEFAULT);
                $sql_update = "UPDATE felhasznalok SET jelszo = ? WHERE email = ?";
                $stmt_update = $connection->prepare($sql_update);
                $stmt_update->bindParam(1, $uj_jelszo_hash);
                $stmt_update->bindParam(2, $email);
                $result = $stmt_update->execute();
                if($result){
                    $sql_expire = "UPDATE jelszo_helyreallitas SET lejar_datum = ?";
                    $current_time = time();
                    $current_timestamp = date('Y-m-d H:i:s', $current_time);
                    $stmt_expire = $connection->prepare($sql_expire);
                    $stmt_expire->bindParam(1, $current_timestamp);
                    $stmt_expire->execute();
                    sleep(5);
                    Redirect::to('login');
                    
                }else{
                    Message::error('Sikertelen SQL utasítás!');
                }
            }else{
                Message::error('Nem egyeznek meg a jelszavak!');
            }
        }
        ?>
        <form method="post">
            <label for="uj_jelszo">Új jelszó:</label>
            <input type="password" name="uj_jelszo" required><br>
            <label for="jelszo_megerosites">Jelszó megerősítése:</label>
            <input type="password" name="jelszo_megerosites" required><br>
            <input type="submit" value="Küldés" name="reset_submit">
        </form>
    <?php
    }else{
        Message::error('Lejárt URL!');
    }
}else{
    Message::error('Hibás URL');
}