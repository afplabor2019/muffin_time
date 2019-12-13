<?php if(!defined("APP_MODE")) { exit; } ?>
<?php
if(!logged_in()){
    redirect('login');
}
include_once 'partials/_header.php';
include_once 'partials/_navbar.php';
?>
<div class="container">
    <div class="profile-heading text-center mt-5">
        <h1>Profil módosítása</h1>
        <hr class="divider"/>
    </div>
    <div class="profile-options">
        <div class="row">
            <div class="col-md-4 mx-auto mt-3">
                <?php
                    if(isset($_POST["addressChange"])){
                        $errors = [];

                        $zip = trim($_POST["zip"]);
                        $city = trim($_POST["city"]);
                        $address = trim($_POST["address"]);
                        $street_number = trim($_POST["street_number"]);
                        $floor = trim($_POST["floor"]);
                        $phone = trim($_POST["phone"]);

                        if($zip == null){
                            $errors['zip'][] = "Kötelező mező!";
                        }else{
                            // ajax, megnézni, hogy létezik-e
                        }

                        if($city == null){
                            $errors['city'][] = "Kötelező mező!";
                        }

                        if($address == null){
                            $errors['address'][] = "Kötelező mező!";
                        }

                        if($street_number == null){
                            $errors['street_number'][] = "Kötelező mező!";
                        }

                        if($phone == null){
                            $errors['phone'] = "Kötelező mező!";
                        }

                        if(count($errors) == 0){
                            if(isset($floor) && $floor != null){
                                $params = [
                                    "zip" => $zip,
                                    "city" => $city,
                                    "address" => $address,
                                    "street_number" => $street_number,
                                    "floor" => $floor,
                                    "phone" => $phone
                                ];

                                if(change_user_address($params)){
                                    echo display_success('Sikeres adatmódosítás!');
                                }else{
                                    echo display_error("Sikertelen");
                                }
                            }else{
                                $params = [
                                        "zip" => $zip,
                                        "city" => $city,
                                        "address" => $address,
                                        "street_number" => $street_number,
                                        "phone" => $phone
                                ];


     
                                if(change_user_address($_SESSION["userid"], $params)){
                                    echo display_success('Sikeres adatmódosítás!');
                                }else{
                                    echo display_error("Sikertelen");
                                }
                            }
                        }
                    }


                    if(isset($_POST["passChange"])){
                        $errors = [];

                        $current = trim($_POST["currentpass"]);
                        $newpass = trim($_POST["newpass"]);
                        $newpassre = trim($_POST["newpassre"]);

                        if($current == null){
                            $errors['current'][] = "Kötelező mező!";
                        }else{
                            if(!password_verify($current, $userdata["password"])){
                                $errors['current'][] = "Hibás jelszó!";
                            }
                        }

                        if($newpass == null){
                            $errors['newpass'][] = "Kötelező mező!";
                        }
                        
                        if($newpassre == null){
                            $errors['newpassre'][] = "Kötelező mező!";
                        }else{
                            if($newpassre != $newpass){
                                $errors['newpassre'][] = "A két jelszó nem egyezik meg!";
                            }
                        }

                        if(count($errors) == 0){
                            if(change_user_password($_SESSION["userid"], $newpass)){
                                echo display_success("Sikeres jelszómódosítás!");
                            }else{
                                echo display_error("Hiba a jelszómódosítás közben!");
                            }
                        }
                    }
                ?>
            </div>
        </div>
        <h5 class="text-center mt-4">Szállítási adatok</h5>
        <form method="POST">
            <div class="address-form">
                <div class="form-row delivery-row mx-auto">
                    <div class="form-group col-md-2 ml-auto">
                        <input type="number" class="form-control<?php echo isset($errors['zip']) ? ' has-error' : ''; ?>" id="zip" placeholder="Irsz" name="zip" value="<?php echo isset($zip) ? $zip : ''; ?>">
                    </div>
                    <div class="form-group col-md-6 mr-auto">
                        <input type="text" class="form-control<?php echo isset($errors['city']) ? ' has-error' : ''; ?>" id="city" placeholder="Város" name="city" value="<?php echo isset($city) ? $city : ''; ?>">
                    </div>
                </div>
                <div class="form-row delivery-row mx-auto">
                    <div class="form-group col-md-6 ml-auto">
                        <input type="text" class="form-control<?php echo isset($errors['address']) ? ' has-error' : ''; ?>" id="address" placeholder="Cím" name="address" value="<?php echo isset($address) ? $address : ''; ?>">
                    </div>
                    <div class="form-group col-md-2 mr-auto">
                        <input type="number" class="form-control<?php echo isset($errors['street_number']) ? ' has-error' : ''; ?>" id="street_number" placeholder="Házszám" name="street_number" value="<?php echo isset($street_number) ? $street_number : ''; ?>">
                    </div>
                </div>
                <div class="form-row delivery-row mx-auto">
                    <div class="form-group col-md-3 mx-auto">
                        <input type="text" class="form-control<?php echo isset($errors['floor']) ? ' has-error' : ''; ?>" id="floor" placeholder="Emelet/Ajtó" name="floor" value="<?php echo isset($floor) ? $floor : ''; ?>">
                    </div>
                    <div class="col-md-5"></div>
                </div>
                <div class="form-row delivery-row mx-auto">
                    <div class="form-group col-md-8 mx-auto">
                        <input type="text" class="form-control<?php echo isset($errors['phone']) ? ' has-error' : ''; ?>" id="phone" placeholder="+36701234567" name="phone" value="<?php echo isset($phone) ? $phone : ''; ?>">
                    </div>
                </div>
                <div class="form-row delivery-row mx-auto">
                    <div class="form-group col-md-8 mx-auto">
                        <button type="submit" class="btn btn-primary ml-auto" name="addressChange">Mentés</button>
                    </div>
                </div>
            </div>
        </form>

        <hr class="profile-option-divider">

        <h5 class="text-center mt-4">Jelszóváltoztatás</h5>
        <form method="POST">
            <div class="row">
                <div class="col-md-4 mx-auto mt-3">
                    <input type="password" class="form-control w-60 mx-auto<?php echo isset($errors['current']) ? ' has-error' : ''; ?>" name="currentpass" id="currentpass" placeholder="Jelenlegi jelszó">
                    <?php echo display_errors('current'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mx-auto mt-3">
                    <input type="password" class="form-control w-60 mx-auto<?php echo isset($errors['newpass']) ? ' has-error' : ''; ?>" name="newpass" id="newpass" placeholder="Új jelszó">
                    <?php echo display_errors('newpass'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mx-auto mt-3">
                    <input type="password" class="form-control w-60 mx-auto<?php echo isset($errors['newpassre']) ? ' has-error' : ''; ?>" name="newpassre" id="newpassre" placeholder="Új jelszó megerősítése">
                    <?php echo display_errors('newpassre'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mx-auto mt-3">
                    <button type="submit" class="btn btn-primary" name="passChange">Mentés</button>
                </div>
            </div>
        </form>
    </div>
</div>


<?php
include_once 'partials/_footer.php';
?>