<?php
include_once 'config/init.php';
include_once '_header.php';
?>
<?php
if(Session::isset('userid')){
?>

<h1>Dashboard</h1>
Üdvözöllek, <?=Session::get('userid')?>!
<?php
if(User::isAdmin(Session::get('userid'))){
    echo "<a href='?p=admin'>Admin panel</a> ";
}
?>
<a href="?p=logout">Kilépés</a>

<?php
}
?>
<?php
include_once '_footer.php';
?>