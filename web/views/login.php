<?php include_once "config/init.php"; ?>
<?php include_once "_header.php"; ?>
<?php
if(Session::isset('userid')){
    Redirect::to('home');
}

if(isset($_POST["login_submit"])){
    $felhasznalonev = trim(html_entity_decode($_POST["username"]));
    $jelszo = trim(html_entity_decode($_POST["password"]));

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
<div id="formContent">
  
  <!-- Icon -->
        <div>
            <img src="img/logo.png" id="icon" alt="Logo" />
        </div>

  <!-- Login Form -->
        <form method="post">
            <input type="text" id="username" name="username" placeholder="username" required>
            <input type="password" id="password" name="password" placeholder="password" required>
            <input type="submit" value="Log In" name="login_submit">
        </form>

  <!-- Remind Password -->
        <div id="formFooter">
            <a class="underlineHover" href="?p=lost_pass">Forgot Password?</a>
        </div>

        </div>
</form>
<?php include_once "_footer.php"; ?>