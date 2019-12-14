<div class="container mt-5">
	<div class="card">
		<div class="container-fluid">
		<?php
			if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_to_cart"])){
				array_push($_SESSION['cart'], $muffin["muffin_id"]);
				redirect('cart');
			}
		?>
			<form method="POST">
				<div class="wrapper row">
					<div class="preview col-md-6">
						<div class="preview-pic tab-content">
							<div class="tab-pane active product-img" ><img src="<?php echo asset('img/default_muffin.png'); ?>"/></div>
						</div>
					</div>
					<div class="details col-md-6">
						<h3 class="product-title"><?=$muffin["muffin_name"]?></h3>
						<p class="product-description"><?=$muffin["muffin_description"]?></p>
						<h4 class="price">Ár <span><?=$muffin["muffin_price"]?> Ft</span></h4>

						<div class="action mt-5">
							<button class="btn btn-primary" type="submit" name="add_to_cart">Kosárba tesz</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>