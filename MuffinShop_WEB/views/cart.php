<?php if(!defined("APP_MODE")) { exit; } ?>
<?php
include_once "partials/_header.php";
include_once "partials/_navbar.php";
if(!logged_in()){
    redirect('home');
}
if(isset($_GET["item_added"])){
    echo display_success("A termék a kosárba került!");
}
?>
<div class="container">
    <div class="order-notice mt-4">
        <div class="alert alert-info"><b>Emlékeztető:</b> Felhívjuk kedves vásárlóink figyelmét, hogy rendelés csak akkor adható le, ha a Fiók beállításaiban már adott meg szállítási címet!</div>
    </div>
</div>

<div class="pb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
        <?php
            if(count($_SESSION['cart']) == 0):
        ?>
        <h2 class='text-center mt-3'>A kosarad üres!</h2>
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>
        <?php
            if(isset($_GET["action"]) && isset($_GET["product_id"])){
                switch($_GET["action"]){
                    case "delete_item":
                        foreach($_SESSION["cart"] as $selected => $val){
                            if($val == $_GET["product_id"]){
                                unset($_SESSION["cart"][$selected]);
                            }
                        }
                    redirect('cart');
                    break;
                }
            }

            if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["order_submit"])){
              if(check_existing_user_address($_SESSION["userid"])){
                // adat felvitele adatbázisba
                // kosár ürítése
                $userid = $_SESSION["userid"];
                $order_date = date("Y-m-d H:i:s");
                $delivery_mode = trim($_POST["deliveryMode"]);
                $payment_method = trim($_POST["paymentMethod"]);

                $total = 0;

                foreach(array_unique($_SESSION['cart']) as $cart_item){
                    $product = get_muffin_by_id($cart_item);
                    $product_qty = count(array_keys($_SESSION["cart"], $product["muffin_id"]));
                    $total += $product_qty * $product["muffin_price"];

                    if(place_order($userid, $order_date, $delivery_mode, $payment_method, $total)){
                      $_SESSION['cart'] = array();
                      redirect('home', ["order_success" => 1]);
                    }else{
                      echo display_error("Sikertelen rendelés!");
                    }
                }
              }else{
                redirect('home', ['order_success' => 0]);
              }
            }
        ?>
        <?php $total = 0; ?>
        <form method="POST" action="<?php echo url('cart'); ?>">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-uppercase">Termék</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Ár</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Darab</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Művelet</div>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php
                    foreach(array_unique($_SESSION['cart']) as $cart_item):
                ?>
                <?php
                    $product = get_muffin_by_id($cart_item);
                    $product_qty = count(array_keys($_SESSION["cart"], $product["muffin_id"]));

                    $total += $product["muffin_price"] * $product_qty;
                ?>
                <tr>
                  <th scope="row" class="border-0">
                    <div class="p-2">
                      <img src="<?php echo asset('img/default_muffin.png'); ?>" alt="" width="70" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="<?php echo url('product_details', ['product_id' => $product["muffin_id"]]); ?>" class="text-dark d-inline-block align-middle"><?=$product["muffin_name"]?></a></h5>
                      </div>
                    </div>
                  </th>
                  <td class="border-0 align-middle"><strong><?=$product["muffin_price"]?></strong> Ft</td>
                  <td class="border-0 align-middle"><strong><?=$product_qty?></strong></td>
                  <td class="border-0 align-middle"><a href="<?php echo url('cart', ["action" => "delete_item", "product_id" => $product['muffin_id']]); ?>"><i class="fa fa-trash"></i></a></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="row py-5 p-4 bg-white rounded shadow-sm">
        <div class="col-lg-6">
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Szállítási mód</div>
          <div class="p-4">
            <div class="delivery-mode">
              <label class="radio-inline mr-5"><input type="radio" name="deliveryMode" value="personal" checked="checked"> Személyes átvétel</label>
              <label class="radio-inline mr-5"><input type="radio" name="deliveryMode" value="home"> Házhozszállítás</label>
            </div>
            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Fizetési mód</div>
            <div class="payment-method">
              <label class="radio-inline mr-5"><input type="radio" name="paymentMethod" value="cash" checked="checked"> Készpénz</label>
              <label class="radio-inline mr-5"><input type="radio" name="paymentMethod" value="creditcard"> Bankkártya</label>
            </div>
          <div class="p-4">
            <p class="font-italic mb-4">Kérjük amennyiben bármilyen megjegyzése, kérése van írja le nekünk.</p>
            <textarea name="" cols="30" rows="2" class="form-control"></textarea>
          </div>
        </div>
      </div>

        <div class="col-lg-6 ml-auto">
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Rendelés összegzése </div>
          <div class="p-4">
            <ul class="list-unstyled mb-4">
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Részösszeg </strong><strong><?=$total?> Ft</strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Szállítási költség</strong><strong id="deliveryPrice">INGYENES</strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Összesen</strong>
                <h5 class="font-weight-bold"><?=$total?> Ft</h5>
              </li>
            </ul><button class="btn btn-dark rounded-pill py-2 btn-block" <?php echo check_existing_user_address($_SESSION["userid"]) ? "" : 'disabled'; ?> type="submit" name="order_submit">Fizetés</button>
          </div>
        </div>
      </div>
    </div>
    </form>
</div>
<?php endif; ?>

<?php
    include_once 'partials/_footer.php';
?>