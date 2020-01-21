<?php if(!defined("APP_MODE")) { exit; } ?>
<?php
include_once 'partials/_header.php';
include_once 'partials/_navbar.php';

if(!logged_in()){
    redirect('home');
}

if($userdata["role"] != "admin"){
    redirect("home");
}

$users = get_all_users();

if(isset($_GET["success"])){
    switch($_GET["success"]){
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

if(!isset($_GET["user_id"])){
    redirect('admin_manage_users');
}

$user = get_user_by_id($_GET["user_id"]);
if($user == null){
    redirect('admin_manage_users');
}

if(isset($_GET["change_data"])){
    switch($_GET["change_data"]){
        case "0":
            echo display_error("Sikertelen adatmódosítás!");
        break;
        case "1":
            echo display_success('Sikeres adatmódosítás!'); 
        break;
    }
}
?>

<div class="container">
    <div class="profile-heading text-center mt-5">
        <h1><?=$user["username"]?> <span class="light-text">szerkesztése</span></h1>
        <hr class="divider"/>
    </div>
    <div class="profile-options">
        <div class="row">
            <div class="col-md-4 mx-auto mt-3">
                <?php
                    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_user"])){
                        $errors = [];

                        $username = trim($_POST["username"]);
                        $email = trim($_POST["email"]);
                        $role = trim($_POST["role"]);
                        $zip = trim($_POST["zip"]);
                        $city = trim($_POST["city"]);
                        $address = trim($_POST["address"]);
                        $extra = trim($_POST["floor"]);
                        $phone = trim($_POST["phone"]);

                        if($username == null){
                            $errors["username"][] = "Kötelező mező!";
                        }

                        if($email == null){
                            $errors["email"][] = "Kötelező mező!";
                        }

                        if($role == null){
                            $errors["role"][] = "Kötelező mező!";
                        }

                        if($zip == null){
                            $errors["zip"][] = "Kötelező mező!";
                        }

                        if($city == null){
                            $errors["city"][] = "Kötelező mező!";
                        }

                        if($address == null){
                            $errors["address"][] = "Kötelező mező!";
                        }

                        if($phone == null){
                            $errors["phone"][] = "Kötelező mező!";
                        }

                        if(count($errors) == 0){
                            if(isset($extra) && $extra != null){
                                $params = [
                                    "zip" => $zip,
                                    "city" => $city,
                                    "address" => $address,
                                    "floor" => $floor,
                                    "phone" => $phone
                                ];

                                if(change_user_address($_GET["user_id"], $params)){
                                    redirect('admin_edit_user', ['change_data' => 1]);
                                }else{
                                    redirect('admin_edit_user', ['change_data' => 0]);
                                }
                            }else{
                                $params = [
                                        "zip" => $zip,
                                        "city" => $city,
                                        "address" => $address,
                                        "phone" => $phone
                                ];


     
                                if(change_user_address($_GET["user_id"], $params)){
                                    redirect('admin_edit_user', ['change_data' => 1]);
                                }else{
                                    redirect('admin_edit_user', ['change_data' => 0]);
                                }
                            }
                        }
                    }
                ?>
            </div>
        </div>
        <form method="POST" enctype="multipart/form-data">
            <div class="add-product-form">
                 <div class="form-row delivery-row mx-auto">
                    <div class="form-group col-md-8 mx-auto">
                        <input type="text" class="form-control<?php echo isset($errors['username']) ? ' has-error' : ''; ?>" id="username" placeholder="Felhasználónév" name="username" value="<?php echo isset($user) ? $user["username"] : ''; ?>">
                        <?php echo display_errors('username'); ?>
                    </div>
                </div>
                <div class="form-row delivery-row mx-auto">
                    <div class="form-group col-md-8 mx-auto">
                        <input class="form-control<?php echo isset($errors['email']) ? ' has-error' : ''; ?>" name="email" placeholder="Email cím" value="<?php echo isset($user) ? $user["email"] : ''; ?>" type="email">
                        <?php echo display_errors('email'); ?>
                    </div>
                </div>

                <div class="form-row delivery-row mx-auto">
                    <div class="form-group col-md-3 mx-auto">
                        <div class="input-group">
                            <select name="role" id="role" class="form-control">
                                <option name="basic" value="basic" <?php echo isset($user) && $user["role"] == "basic" ? "selected" : ""; ?>>Felhasználó</option>
                                <option name="admin" value="admin" <?php echo isset($user) && $user["role"] == "admin" ? "selected" : ""; ?>>Admin</option>
                            </select>
                            <?php echo display_errors('role'); ?>
                        </div>                        
                    </div>
                    <div class="col-md-5"></div>
                </div>

                <div class="address-form">
                <div class="form-row delivery-row mx-auto">
                    <div class="form-group col-md-2 ml-auto">
                        <input type="number" class="form-control<?php echo isset($errors['zip']) ? ' has-error' : ''; ?>" id="zip" placeholder="Irsz" name="zip" id="zip" value="<?php echo isset($user) ? $user["zip"] : ''; ?>">
                    </div>
                    <div class="form-group col-md-6 mr-auto">
                        <input type="text" class="form-control<?php echo isset($errors['city']) ? ' has-error' : ''; ?>" id="city" placeholder="Város" name="city" value="<?php echo isset($user) ? $user["city"] : ''; ?>" readonly>
                    </div>
                </div>
                <div class="form-row delivery-row mx-auto">
                    <div class="form-group col-md-8 mx-auto">
                        <input type="text" class="form-control<?php echo isset($errors['address']) ? ' has-error' : ''; ?>" id="address" placeholder="Cím" name="address" value="<?php echo isset($user) ? $user["address"] : ''; ?>">
                    </div>
                </div>
                <div class="form-row delivery-row mx-auto">
                    <div class="form-group col-md-3 mx-auto">
                        <input type="text" class="form-control<?php echo isset($errors['floor']) ? ' has-error' : ''; ?>" id="floor" placeholder="Emelet/Ajtó" name="floor" value="<?php echo isset($user) ? $user["extra"] : ''; ?>">
                    </div>
                    <div class="col-md-5"></div>
                </div>
                <div class="form-row delivery-row mx-auto">
                    <div class="form-group col-md-8 mx-auto">
                        <input type="text" class="form-control<?php echo isset($errors['phone']) ? ' has-error' : ''; ?>" id="phone" placeholder="+36701234567" name="phone" value="<?php echo isset($user) ? $user["phone"] : ''; ?>">
                    </div>
                </div>
            </div>
                <div class="form-row delivery-row mx-auto">
                    <div class="form-group col-md-8 mx-auto">
                        <button type="submit" class="btn btn-primary ml-auto" name="edit_user">Küldés</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
include_once 'partials/_footer.php';
?>