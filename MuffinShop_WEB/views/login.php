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
    <h1>Belépés az oldalra</h1>    
  </div>
  <div class="row justify-content-center align-items-center">
  <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $errors = [];

      $email = trim($_POST["email"]);
      $jelszo = trim($_POST["jelszo"]);

      if($email == null){
        $errors['email'][] = "Az email megadása kötelező!";
      }else{
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          $errors['email'][] = "Hibás email formátum!";
        }
      }

      if($jelszo == null){
        $errors['jelszo'][] = "A jelszó megadása kötelező!";
      }

      if(count($errors) == 0){
        if(login_user($email, $jelszo)){
          redirect('home');
        }else{
          echo display_error("Sikertelen belépés!");
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
          <input type="email" class="form-control" placeholder="Email cím" name="email" value="<?php echo isset($email) ? $email : ""; ?>"/>
          <?php echo display_errors('email'); ?>
        </div>
        <div class="form-group">
          <i class="fas fa-lock"></i>
          <input type="password" class="form-control" placeholder="Jelszó" name="jelszo"/>
          <?php echo display_errors('jelszo'); ?>
        </div>
        <div class="form-group">
          <div class="container">
            <div class="row">
              <button type="submit" class="col-6 btn btn-primary btn-sm mx-auto">Belépés</button>
            </div>
            <div class="row">
              <a href="<?php echo url('register'); ?>" class="mx-auto mt-3">Regisztráció</a>
            </div>
            <div class="row">
              <a href="<?php echo url('lost_pass'); ?>" class="mx-auto mt-3">Elfelejtett jelszó</a>
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