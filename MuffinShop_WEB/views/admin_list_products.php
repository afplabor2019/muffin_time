<?php if(!defined("APP_MODE")) { exit; } ?>
<?php
include_once 'partials/_header.php';
include_once 'partials/_navbar.php';

if(!logged_in()){
    redirect('home');
}

if($userdata["role"] != "admin"){
    redirect('home');
}

$muffins = get_all_muffins();

if(isset($_GET["action_success"])){
    switch($_GET["action_success"]){
        case "0":
            echo display_error("Sikertelen művelet végrehajtás!");
        break;
        case "1":
            echo display_success("Sikeres művelet végrehajtás!");
        break;
        default:
            redirect('home');
        break;
    }
}

if(isset($_GET["action"]) && isset($_GET["product_id"])){
    switch($_GET["action"]){
        case "delete_item":
            if(delete_muffin($_GET["product_id"])){
                redirect('admin_list_products', ["action_success" => 1]);
            }else{
                redirect('admin_list_products', ["action_success" => 0]);
            }
        break;
        default:
            redirect('home');
        break;
    }
}
?>

<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th scope="col" class="border-0 bg-light">
                <div class="p-2 px-3 text-uppercase">Azonosító</div>
            </th>
            <th scope="col" class="border-0 bg-light">
                <div class="py-2 text-uppercase">Megnevezés</div>
            </th>
            <th scope="col" class="border-0 bg-light">
                <div class="py-2 text-uppercase">Leírás</div>
            </th>
            <th scope="col" class="border-0 bg-light">
                <div class="py-2 text-uppercase">Ár</div>
            </th>
            <th scope="col" class="border-0 bg-light">
                <div class="py-2 text-uppercase">Műveletek</div>
            </th>
        </tr>
        </thead>
        <tbody>
            <?php if($muffins->num_rows <= 0): ?>
                <h1 class="text-center">Nincsen termék az adatbázisban!</h1>
            <?php endif; ?>
            <?php foreach($muffins as $muffin): ?>
                <tr>
                  <td class="border-0 align-middle"><strong>#<?=$muffin["muffin_id"]?></strong></td>
                  <th scope="row" class="border-0">
                    <div class="p-2">
                      <img src="<?php echo asset('img/default_muffin.png'); ?>" alt="" width="70" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="<?php echo url('product_details', ['product_id' => $muffin["muffin_id"]]); ?>" class="text-dark d-inline-block align-middle"><?=$muffin["muffin_name"]?></a></h5>
                      </div>
                    </div>
                  </th>
                  <td class="border-0 align-middle"><?=$muffin["muffin_description"]?></td>
                  <td class="border-0 align-middle"><strong><?=$muffin["muffin_price"]?></strong> Ft</td>
                  <td class="border-0 align-middle"><a href="<?php echo url('admin_edit_product', ["product_id" => $muffin["muffin_id"]]); ?>"><i class="fas fa-pencil-alt"></i></a> &nbsp; <a href="<?php echo url('admin_list_products', ["action" => "delete_item", "product_id" => $muffin['muffin_id']]); ?>"><i class="fa fa-trash"></i></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php
include_once 'partials/_footer.php';
?>