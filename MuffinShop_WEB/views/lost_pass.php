<?php if(!defined("APP_MODE")) { exit; } ?>
<?php
if(logged_in()){
  redirect('home');
}
include_once "partials/_header.php";
include_once "partials/_navbar.php";
?>
<div class="container-fluid h-100">
  <div class="row justify-content-center align-items-center mt-5">
    <h1>Elfelejtett jelszó</h1>    
  </div>
  <div class="row justify-content-center align-items-center">
  <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $errors = [];

      $email = trim($_POST["email"]);

      if($email == null){
        $errors['email'][] = "Az email megadása kötelező!";
      }else{
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          $errors['email'][] = "Hibás email formátum!";
        }
      }

      if(count($errors) == 0){
        if(reset_password($email)){
          echo display_success('Sikeres jelszómódosítás! Kövesd az email címedre küldött levélben található lépéseket!');
        }else{
          echo display_error("Hiba a jelszómódosításkor!");
        }
      }
    }
  ?>
  </div>
  <div class="row justify-content-center align-items-center h-100 mt-3">
    <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3 login-form">
      <form method="POST">
        <div class="form-group">
          <i class="fas fa-envelope"></i>
          <input type="email" class="form-control" placeholder="Regisztrált email cím" name="email" value="<?php echo isset($email) ? $email : ""; ?>"/>
          <?php echo display_errors('email'); ?>
        </div>
        <div class="form-group">
          <div class="container">
            <div class="row">
              <button type="submit" class="col-6 btn btn-primary btn-sm mx-auto">Küldés</button>
            </div>
            <div class="row">
              <a href="<?php echo url('login'); ?>" class="mx-auto mt-3">Vissza a belépéshez</a>
            </div>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
<?php
include_once "partials/_footer.php";
?>