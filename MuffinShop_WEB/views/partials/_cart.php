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
        ?>
        <?php $total = 0; ?>
          <!-- Shopping cart table -->
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

        <div class="col-lg-6 ml-auto">
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Rendelés összegzése </div>
          <div class="p-4">
            <ul class="list-unstyled mb-4">
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Részösszeg </strong><strong><?=$total?> Ft</strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Szállítási költség</strong><strong>INGYENES</strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Összesen</strong>
                <h5 class="font-weight-bold"><?=$total?> Ft</h5>
              </li>
            </ul><a href="#" class="btn btn-dark rounded-pill py-2 btn-block <?php echo check_existing_user_address($_SESSION["userid"]) ? "" : 'disabled'; ?>">Fizetés</a>
          </div>
        </div>
      </div>
    </div>
</div>
<?php endif; ?>