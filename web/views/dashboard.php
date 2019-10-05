<?php
include_once 'config/init.php';
include_once '_header.php';
?>

<h1>Dashboard</h1>
Üdvözöllek, <?=$_SESSION['userid']?>!
<a href="?p=logout">Kilépés</a>

<?php
include_once '_footer.php';
?>