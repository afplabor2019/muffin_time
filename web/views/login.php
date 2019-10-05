<?php include_once "config/init.php"; ?>
<?php include_once "_header.php"; ?>
<?php
if(Session::isset('userid')){
    Redirect::to('home');
}

if(isset($_POST["login_submit"])){
    $felhasznalonev = trim(html_entity_decode($_POST["felhasznalonev"]));
    $jelszo = trim(html_entity_decode($_POST["jelszo"]));

    $db = new Database();
    $connection = $db->getConnection();

    $sql = "SELECT * FROM felhasznalok WHERE felhasznalonev = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(1, $felhasznalonev);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if(password_verify($jelszo, $result["jelszo"])){
            $_SESSION['userid'] = $result['id'];
            Redirect::to('home');
        }else{
            Message::error('Sikertelen bejelentkezés!');
        }
    }else{
        Message::error('Nincs ilyen felhasználó az adatbázisban!');
    }
}
?>
<form method="post">
<label for="felhasznalonev">Felhasználónév</label>
<input type="text" name="felhasznalonev"> 
<br>
<label for="jelszo">Jelszó</label>
<input type="password" name="jelszo"> 
<br>
<input type="submit" name="login_submit" value="Belépés">
</form>
<?php include_once "_footer.php"; ?>