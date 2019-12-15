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

$min_price = null;
$max_price = null;

if(isset($_GET["min_price"])){
  $min_price = $_GET["min_price"];
}

if(isset($_GET["max_price"])){
  $max_price = $_GET["max_price"];
}

if($min_price != null || $max_price != null){
  $muffins = filter_muffins(["min_price" => $min_price, "max_price" => $max_price]);
}

?>
<div class="container">
  <div class="row mt-5">
    <div class="col-md-4">
      <div class="search-filter">
        <h3 class="text-center m-4">Termékek szűrése</h3>
        <hr class="filter-divider">
        <div class="price-range">
          <div class="price-range-selector">
            <label for="min_price">Min ár:</label>
            <input type="number" class="form-control priceinput" name="min_price" id="min_price" value="<?php echo $min_price != null ? $min_price :  ''; ?>">
          </div>
          <div class="price-range-selector">
            <label for="max_price">Max ár:</label>
            <input type="number" class="form-control priceinput" name="max_price" id="max_price" value="<?php echo $max_price != null ? $max_price :  ''; ?>">
          </div>
          <button type="submit" name="filterSubmit" class="btn btn-primary" id="filterSubmit">Szűrés</button>
          <hr class="filter-divider">
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="product-listing">
        <?php
        if($muffins->num_rows == 0){
          echo "<h2 class='text-center'>Nincs a keresési feltételeknek megfelelő termék!</h2>";
        }
        else{
          foreach($muffins as $muffin){
            include 'partials/_muffin_item.php';
          }
        }
        ?>
      </div>
    </div>
  </div>
</div>
<script>
let filterButton = document.getElementById('filterSubmit');

filterButton.addEventListener('click', (e) => {
    let minPrice = document.getElementById('min_price').value;
    let maxPrice = document.getElementById('max_price').value;

    window.location.href = '?p=home&min_price='+minPrice+'&max_price='+maxPrice;
})
</script>
<?php
include_once "partials/_footer.php";
?>