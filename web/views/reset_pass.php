<?php
include_once 'config/init.php';

if(Session::isset('userid')){
    Redirect::to('home');
}

$email = isset($_GET["email"]) ? $_GET["email"] : '';
$key = isset($_GET["key"]) ? $_GET["key"] : '';

if(empty($email) || empty($key)){
    Message::error('Hibás URL');
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
    if($data["lejar_datum"] < $current_timestamp){
    ?>
        <form method="post">
            <label for="uj_jelszo">Új jelszó:</label>
            <input type="password" name="uj_jelszo"><br>
            <label for="jelszo_megerosites">Jelszó megerősítése:</label>
            <input type="password" name="jelszo_megerosites"><br>
            <input type="submit" value="Küldés" name="reset_submit">
        </form>
    <?php
    }else{
        Message::error('Lejárt URL!');
    }
}else{
    Message:error('Hibás URL');
}