<?php if(!defined("APP_MODE")) { exit; } ?>
<?php
include_once 'partials/_header.php';
include_once 'partials/_navbar.php';

if(!logged_in()){
    redirect('home');
}

$history = get_user_order_history($_SESSION["userid"]);
?>

<?php if($history->num_rows <= 0): ?>
    <h1 class="text-center mt-5">Nincs megjeleníthető rendelés!</h1>
<?php else: ?>
<div class="table-responsive mt-2">
    <table class="table">
        <thead>
        <tr>
            <th scope="col" class="border-0 bg-light">
            <div class="p-2 px-3 text-uppercase">Rendelés azonosító</div>
            </th>
            <th scope="col" class="border-0 bg-light">
            <div class="py-2 text-uppercase">Rendelés dátuma</div>
            </th>
            <th scope="col" class="border-0 bg-light">
            <div class="py-2 text-uppercase">Összesen</div>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php
            while($order_history = $history->fetch_assoc()):
        ?>
        <tr>
            <th scope="row" class="border-0">
            <div class="p-2">
                <img src="<?php echo asset('img/default_muffin.png'); ?>" alt="" width="70" class="img-fluid rounded shadow-sm">
                <div class="ml-3 d-inline-block align-middle">
                <h5 class="mb-0"> <a href="<?php echo url('order_details', ['order_id' => $order_history["order_id"]]); ?>" class="text-dark d-inline-block align-middle">#<?=$order_history["order_id"]?> számú rendelés</a></h5>
                </div>
            </div>
            </th>
            <td class="border-0 align-middle"><strong><?=$order_history["order_date"]?></strong></td>
            <td class="border-0 align-middle"><strong><?=$order_history["total"]?></strong> Ft</td>
        </tr>
        <?php endwhile; ?>
        </tbody>
        </table>
        </div>
    <?php endif; ?>
</div>
</div>

<?php
include_once 'partials/_footer.php';
?>