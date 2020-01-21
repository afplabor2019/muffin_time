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
?>

<div class="container">
    <div class="profile-heading text-center mt-5">
        <h1><?=$user["username"]?> <span class="light-text">szerkesztése</span></h1>
        <hr class="divider"/>
    </div>
    <div class="profile-options">
        <div class="row">
            <div class="col-md-4 mx-auto mt-3">
                
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