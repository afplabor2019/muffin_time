<?php if(!defined("APP_MODE")) { exit; } ?>
<?php
include_once 'partials/_header.php';
include_once 'partials/_navbar.php';
if(!logged_in() || !isset($_GET["order_id"])){
    redirect('home');
}
$order_history = get_user_order_by_id($_SESSION["userid"], $_GET["order_id"]);
$total = 0;
?>

<div class="container">
    <?php if($order_history == null) : ?>
        <h1 class="text-center">Nincs megjeleníthető rendelés!</h1>
    <?php else: ?>
    <div class="table-responsive mt-5">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" class="bg-light">
                        <div class="p-2 px-3 text-uppercase">Termék azonosítója</div>
                    </th>
                    <th scope="col" class="bg-light">
                        <div class="p-2 px-3 text-uppercase">Termék megnevezése</div>
                    </th>
                    <th scope="col" class="bg-light">
                        <div class="p-2 px-3 text-uppercase">Rendelt mennyiség</div>
                    </th>
                    <th scope="col" class="bg-light">
                        <div class="p-2 px-3 text-uppercase">Részösszeg</div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php while($order_data = $order_history->fetch_assoc()): ?>
                <?php $product_data = get_muffin_by_id($order_data["product_id"]); ?>
                <?php $total += $order_data["total"]; ?>
                <?php $payment = $order_data["payment_method"]; ?>
                <?php $delivery = $order_data["delivery_mode"]; ?>
                <tr>
                    <td class="align-middle">
                        <div class="p-2">
                            <div class="ml-3 d-inline-block align-middle">
                                <h5 class="mb-0"><?=$product_data["muffin_id"]?></h5>
                            </div>
                        </div>
                    </td>
                    <td class="align-middle">
                        <div class="p-2">
                            <div class="ml-3 d-inline-block align-middle">
                                <h5 class="mb-0"><?=$product_data["muffin_name"]?></h5>
                            </div>
                        </div>
                    </td>
                    <td class="align-middle">
                        <div class="p-2">
                            <div class="ml-3 d-inline-block align-middle">
                                <h5 class="mb-0"><?=$order_data["qty"]?> db</h5>
                            </div>
                        </div>
                    </td>
                    <td class="align-middle">
                        <div class="p-2">
                            <div class="ml-3 d-inline-block align-middle">
                                <h5 class="mb-0"><?=$order_data["qty"] * $product_data["muffin_price"]?> Ft</h5>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    
    <h6 class="mb-0 mr-5 text-right"><b>Fizetés módja:</b> <span class="light-text"><?=get_payment_name($payment)["payment_method"]?></span></h6>
    <h6 class="mb-0 mr-5 text-right"><b>Szállítás módja:</b> <span class="light-text"><?=get_delivery_name($delivery)["delivery_name"]?></span></h6>
    <h6 class="mb-0 mr-5 text-right"><b>Összesen:</b> <span class="light-text"><?=$total?> Ft</span></h6>

    <?php endif; ?>
</div>

<?php
include_once 'partials/_footer.php';
?>