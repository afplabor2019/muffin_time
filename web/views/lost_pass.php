<?php include_once "config/init.php"; ?>
<?php include_once "_header.php"; ?>
<?php
if(Session::isset('userid')){
    Redirect::to('home');
}

if(isset($_POST["lost_pass_submit"])){
    $email = trim(html_entity_decode($_POST["email"]));
    User::lostPassGenerate($email);
}
?>
<div id="formContent">
  
  <!-- Icon -->
        <div>
            <img src="img/logo.png" id="icon" alt="Logo" />
        </div>

  <!-- Remind Password Form -->
        <form method="post">
            <input type="text" id="email" name="email" placeholder="email">
            <input type="submit" value="Send mail" name="lost_pass_submit">
        </form>

  <!-- Login -->
        <div id="formFooter">
            <a class="underlineHover" href="?p=login">Log In</a>
        </div>

        </div>
<?php include_once "_footer.php"; ?>