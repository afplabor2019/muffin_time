<?php if(!defined("APP_MODE")) { exit; } ?>
<?php
include_once "partials/_header.php";
include_once "partials/_navbar.php";
if(!logged_in()){
    redirect('home');
}
?>
<div class="container">
    <div class="order-notice mt-4">
        <div class="alert alert-info"><b>Emlékeztető:</b> Felhívjuk kedves vásárlóink figyelmét, hogy rendelés csak akkor adható le, ha a Fiók beállításaiban már adott meg szállítási címet!</div>
    </div>
</div>

<?php
    include_once 'partials/_cart.php';
?>

<?php
    include_once 'partials/_footer.php';
?>