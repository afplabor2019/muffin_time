<?php include_once "config/init.php"; ?>
<?php include_once "_header.php"; ?>
<?php
if(isset($_POST["lost_pass_submit"])){
    
}
?>
<form method="post">
<label for="felhasznalonev">Regisztrált email cím:</label>
<input type="email" name="email">
<br>
<input type="submit" name="lost_pass_submit" value="Küldés">
</form>
<?php include_once "_footer.php"; ?>