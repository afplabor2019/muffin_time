<a href="<?php echo url('product_details', ['product_id' => $muffin['muffin_id']]); ?>">
<div class="muffin-item">
    <img src="<?php echo $muffin["muffin_img"] ? "img/". $muffin["muffing_img"] : "img/default_muffin.png"; ?>" class="img-fluid mx-auto d-block">
    <p class="muffin_title mt-3 text-center font-weight-bold"><?=$muffin["muffin_name"]?></p>
    <p class="muffin_desc text-center font-italic"><?=$muffin["muffin_description"]?></p>
    <p class="muffin_price text-right"><?=$muffin["muffin_price"]?><span class="currency"> Ft</span></p>
</div>
</a>