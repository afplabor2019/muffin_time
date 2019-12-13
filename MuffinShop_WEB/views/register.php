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
    <h1>Regisztráció</h1>    
  </div>
  <div class="row justify-content-center align-items-center">
  <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $errors = [];

      $felhasznalonev = trim($_POST["felhasznalonev"]);
      $email = trim($_POST["email"]);
      $jelszo = trim($_POST["jelszo"]);
      $jelszore = trim($_POST["jelszore"]);

      if($felhasznalonev == null){
        $errors['felhasznalonev'][] = "A felhasználónév megadása kötelező!";
      }else{
        $min_felhasznalonev_hossz = 4;
        if(strlen($felhasznalonev) < $min_felhasznalonev_hossz){
          $errors['felhasznalonev'][] = "Minimum hossz: $min_felhasznalonev_hossz karakter";
        }else{
          $max_felhasznalonev_hossz = 45;
          if(strlen($felhasznalonev) > $max_felhasznalonev_hossz){
            $errors['felhasznalonev'][] = "Maximum hossz: $max_felhasznalonev_hossz karakter";
          }else{
            if(check_username($felhasznalonev)){
              $errors['felhasznalonev'][] = "Ez a felhasználónév foglalt!";
            }
          }
        }
      }

      if($email == null){
        $errors['email'][] = "Az email megadása kötelező!";
      }else{
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          $errors['email'][] = "Hibás formátum!";
        }else{
          if(check_email($email)){
            $errors['email'][] = "Ezzel az email címmel már regisztráltak!";
          }
        }
      }

      if($jelszo == null){
        $errors['jelszo'][] = "A jelszó megadása kötelező!";
      }else{
        $min_jelszo_hossz = 4;
        if(strlen($jelszo) < $min_jelszo_hossz){
          $errors['jelszo'][] = "Minimum hossz: $min_jelszo_hossz karakter";
        }
      }

      if($jelszore == null){
        $errors['jelszore'][] = "A jelszó megerősítése kötelező!";
      }else{
        if($jelszo != $jelszore){
          $errors['jelszore'][] = "A két jelszó nem egyezik meg!";
        }
      }

      if(count($errors) == 0){
        if(register_user($felhasznalonev, $email, $jelszo)){
          echo display_success('Sikeres regisztráció!');
        }else{
          echo display_error('Hiba a regisztráció során!');
        }
      }
    }
  ?>
  </div>
  <div class="row justify-content-center align-items-center h-100 mt-3">
    <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3 login-form">
      <form method="POST">
        <div class="form-group">
          <i class="fas fa-user"></i>
          <input type="text" class="form-control" placeholder="Felhasználónév" name="felhasznalonev" value="<?php echo isset($felhasznalonev) ? $felhasznalonev : ''; ?>" autofocus/>
          <?php echo display_errors('felhasznalonev'); ?>
        </div>
        <div class="form-group">
          <i class="fas fa-envelope"></i>
          <input type="email" class="form-control" name="email" placeholder="Email cím" value="<?php echo isset($email) ? $email : ''; ?>"/>
          <?php echo display_errors('email'); ?>
        </div>
        <div class="form-group">
          <i class="fas fa-lock"></i>
          <input type="password" class="form-control" name="jelszo" placeholder="Jelszó"/>
          <?php echo display_errors('jelszo'); ?>
        </div>
        <div class="form-group">
          <i class="fas fa-lock"></i>
          <input type="password" class="form-control" name="jelszore" placeholder="Jelszó megerősítése"/>
          <?php echo display_errors('jelszore'); ?>
        </div>
        <div class="form-group">
          <div class="container">
            <div class="row">
              <button type="submit" class="col-6 btn btn-primary btn-sm mx-auto">Regisztráció</button>
            </div>
            <div class="row">
              <a href="<?php echo url('login'); ?>" class="mx-auto mt-3">Belépés</a>
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