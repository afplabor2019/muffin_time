<?php if(!defined("APP_MODE")){ exit; } ?>
<?php
include_once 'partials/_header.php';
include_once 'partials/_navbar.php';

if(!logged_in()){
    redirect('home');
}

if($userdata["role"] != "admin"){
    redirect('home');
}
?>

<div class="container">
    <div class="profile-heading text-center mt-5">
        <h1>Új termék felvitele</h1>
        <hr class="divider"/>
    </div>
    <div class="profile-options">
        <div class="row">
            <div class="col-md-4 mx-auto mt-3">
                <?php
                    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_new_product"])){
                        $errors = [];

                        $muffin_name = trim($_POST["muffin_name"]);
                        $muffin_description = trim($_POST["muffin_description"]);
                        $muffin_price = trim($_POST["muffin_price"]);
                        $muffin_img = isset($_FILES["muffin_img"]) ? $_FILES["muffin_img"] : null;

                        if($muffin_name == null){
                            $errors['muffin_name'][] = "Kötelező mező!";
                        }else{
                            $min_muffin_name_length = 5;
                            if(strlen($muffin_name) < $min_muffin_name_length){
                                $errors['muffin_name'][] = "Legalább {$min_muffin_name_length} karakter!";
                            }else{
                                $max_muffin_name_length = 255;
                                if(strlen($muffin_name > $max_muffin_name_length)){
                                    $errors['muffin_name'][] = "Legfeljebb {$max_muffin_name_length} karakter!";
                                }
                            }
                        }

                        if($muffin_description == null){
                            $errors['muffin_description'][] = "Kötelező mező!";
                        }else{
                            $min_muffin_description_length = 10;
                            if(strlen($muffin_description) < $min_muffin_description_length){
                                $errors['muffin_description'][] = "Legalább {$min_muffin_description_length} karakter!";
                            }
                        }

                        if($muffin_price == null){
                            $errors['muffin_price'][] = "Kötelező mező!";
                        }else{
                            if(!is_numeric($muffin_price)){
                                $errors['muffin_price'][] = "Csak számot írj be!";
                            }else{
                                $min_muffin_price = 0;
                                $max_muffin_price = 9999;
                                if($muffin_price <= $min_muffin_price || $muffin_price >= $max_muffin_price){
                                    $errors['muffin_price'][] = "Az érték {$min_muffin_price} és {$max_muffin_price} kell legyen!";
                                }
                            }
                        }

                        if($muffin_img != null){
                            if($muffin_img["size"] > 0){

                                $muffin_img_target_dir = BASE_PATH . '/muffins/';
                                $muffin_img_target_name = $muffin_name . "." . explode('.', trim(basename($muffin_img["name"])))[1];
                                $filename = strtolower(str_replace(' ', '', $muffin_img_target_name));
                                
                                $muffin_img_target_file = $muffin_img_target_dir . $filename;
                            
                                $imgExt = strtolower(pathinfo($muffin_img_target_file, PATHINFO_EXTENSION));
                                
                                if(file_exists($muffin_img_target_file)){
                                    $errors["muffin_img"][] = "A fájl már létezik!";
                                }else{
                                    if($muffin_img["size"] > (MAX_UPLOAD_SIZE * 1000000)){
                                        $errors["muffin_img"][] = "Maximum méret: {MAX_UPLOAD_SIZE}MB!";
                                    }else{
                                        $img_allowed_exts = ["jpg","png","jpeg","gif"];
                            
                                        if(!in_array($imgExt, $img_allowed_exts)){
                                            $errors["muffin_img"][] = "Nem engedélyezett fájltípus! Engedélyezett típusok: " . implode(", ", $img_allowed_exts);
                                        }
                                    }
                                }
                            }else{
                                $errors['muffin_img'][] = "Hibás fájlméret!";
                            }
                        }

                        if(count($errors) == 0){
                            if($muffin_img == null){
                                if(insert_muffin($muffin_name, $muffin_description, $muffin_price)){
                                    redirect('home', ['insert_muffin' => 1]);
                                }else{
                                    redirect('home', ['insert_muffin' => 0]);
                                }
                            }else{
                                if(move_uploaded_file($muffin_img["tmp_name"], $muffin_img_target_file)){
                                    if(insert_muffin($muffin_name, $muffin_description, $muffin_price, $filename)){
                                        redirect('home', ["insert_muffin" => 1]);
                                    }else{
                                        redirect('home', ['insert_muffin' => 0]);
                                    }
                                }else{
                                    redirect('home', ['insert_muffin' => 0]);
                                }
                            }
                        }
                    }
                ?>
            </div>
        </div>
        <h5 class="text-center mt-4">Információk a termékről</h5>
        <form method="POST" enctype="multipart/form-data">
            <div class="add-product-form">
                 <div class="form-row delivery-row mx-auto">
                    <div class="form-group col-md-8 mx-auto">
                        <input type="text" class="form-control<?php echo isset($errors['muffin_name']) ? ' has-error' : ''; ?>" id="address" placeholder="Muffin megnevezése" name="muffin_name" value="<?php echo isset($muffin_name) ? $muffin_name : ''; ?>">
                        <?php echo display_errors('muffin_name'); ?>
                    </div>
                </div>
                <div class="form-row delivery-row mx-auto">
                    <div class="form-group col-md-8 mx-auto">
                        <textarea class="form-control<?php echo isset($errors['muffin_description']) ? ' has-error' : ''; ?>" name="muffin_description" placeholder="Muffin leírása"><?php echo isset($muffin_description) ? $muffin_description : ''; ?></textarea>
                        <?php echo display_errors('muffin_description'); ?>
                    </div>
                </div>
                <div class="form-row delivery-row mx-auto">
                    <div class="form-group col-md-3 mx-auto">
                        <input type="number" min="1" max="9999" class="form-control<?php echo isset($errors['muffin_price']) ? ' has-error' : ''; ?>" placeholder="Ár" name="muffin_price" value="<?php echo isset($muffin_price) ? $muffin_price : ''; ?>" value="<?php echo isset($muffin_price) ? $muffin_price : "1"; ?>">
                        <?php echo display_errors('muffin_price'); ?>
                    </div>
                    <div class="col-md-5"></div>
                </div>
                <div class="form-row delivery-row mx-auto">
                    <div class="form-group col-md-8 mx-auto">
                        <input type="file" name="muffin_img" class="form-control">
                        <?php echo display_errors('muffin_img'); ?>
                    </div>
                </div>
                <div class="form-row delivery-row mx-auto">
                    <div class="form-group col-md-8 mx-auto">
                        <button type="submit" class="btn btn-primary ml-auto" name="add_new_product">Küldés</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
include_once 'partials/_footer.php';
?>