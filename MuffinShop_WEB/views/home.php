<?php if(!defined("APP_MODE")) { exit; } ?>
<?php
include_once "partials/_header.php";
include_once "partials/_navbar.php";
$muffins = get_all_muffins();

if(isset($_GET["order_success"])){
  switch($_GET["order_success"]){
    case "0":
      echo display_error("Hiba történt a rendelés közben!");
    break;
    case "1":
      echo display_success("Rendelését sikeresen fogadtuk!");
    break;
  }
}
?>
<div class="container">
  <div class="row mt-5">
    <div class="col-md-4">
      <div class="search-filter">
        <h3 class="text-center m-4">Termékek szűrése</h3>
        <hr class="filter-divider">
        <div class="delivery-mode">
          <p class="filter-name font-weight-bold">Szállítás módja</p>
          <div class="delivery-mode-option">
            <label><input type="checkbox" name="pickup" id="pickup"> Személyes átvétel</label>
          </div>
          <div class="delivery-mode-option">
            <label><input type="checkbox" name="homedelivery" id="homedelivery"> Kiszállítás</label>
          </div>
        </div>
        <hr class="filter-divider">
        <div class="price-range">
          <div class="price-range-selector">
            <label for="min_price">Min ár:</label>
            <input type="number" class="form-control priceinput" name="min_price" id="min_price">
          </div>
          <div class="price-range-selector">
            <label for="max_price">Max ár:</label>
            <input type="number" class="form-control priceinput" name="max_price" id="max_price">
          </div>
          <hr class="filter-divider">
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="product-listing">
        <?php
        if($muffins != null){
          foreach($muffins as $muffin){
            include 'partials/_muffin_item.php';
          }
        }
        else{
          echo "<h2 class='text-center'>Nincs megjeleníthető termék!</h2>";
        }
        ?>
      </div>
    </div>
  </div>
</div>
<?php
include_once "partials/_footer.php";
?>