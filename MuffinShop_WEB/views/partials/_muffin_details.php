<div class="container mt-5">
	<div class="card">
		<div class="container-fluid">
		<?php
			if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_to_cart"])){
				if(!logged_in()){
					redirect('home');
				}
				$errors = [];
				$qty = trim($_POST["qty"]);

				if(!is_numeric($qty)){
					$errors['qty'][] = "Csak számot írjon be!";
				}else{
					if($qty <= 0 || $qty > 10){
						$errors['qty'][] = "A mennyiségnek 1 és 10 között kell lennie!";
					}
				}

				if(count($errors) == 0){
					for($i = 0; $i < $qty; $i++){
						array_push($_SESSION['cart'], $muffin["muffin_id"]);
					}
					redirect('cart', ['item_added' => 1]);
				}
			}
		?>
			<form method="POST">
				<div class="wrapper row">
					<div class="preview col-md-6">
						<div class="preview-pic tab-content">
							<div class="tab-pane active product-img"><img src="<?php echo asset('img/default_muffin.png'); ?>"/></div>
						</div>
					</div>
					<div class="details col-md-6">
						<h3 class="product-title"><?=$muffin["muffin_name"]?></h3>
						<p class="product-description"><?=$muffin["muffin_description"]?></p>
						<h4 class="price">Ár <span><?=$muffin["muffin_price"]?> Ft</span></h4>

						<div class="action mt-5">
							<input type="number" class="form-control qtyCartInput<?php echo isset($errors['qty']) ? " has-error" : ''; ?>" min="1" max="10" name="qty" value="1"> <button class="btn btn-primary" type="submit" name="add_to_cart">Kosárba tesz</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>