<?php if(!defined("APP_MODE")) { exit; } ?>
<?php
include_once "partials/_header.php";
include_once "partials/_navbar.php";
if(!isset($_GET["product_id"])){
    redirect('home');
}else{
    $muffin_id = $_GET["product_id"];
}
$muffin = get_muffin_by_id($muffin_id);
?>
<?php
    include_once 'partials/_muffin_details.php';
?>
<?php
include_once 'partials/_footer.php';
?>