<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-pink">
  <a class="navbar-brand" href="<?php echo url('home'); ?>"><i class="fas fa-birthday-cake"></i> MuffinShop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#muffinNavbar" aria-controls="muffinNavbar" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="muffinNavbar">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item<?php echo $page == 'home' ? ' active' : ''; ?>">
        <a class="nav-link" href="<?php echo url('home'); ?>">Összes termék</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <?php
      if(isset($_SESSION["userid"])):
      ?>
      <li class="nav-item mr-2">
        <a href="<?php echo url('cart'); ?>" class="nav-link">
          <i class="fas fa-shopping-cart"></i> (<?php echo count($_SESSION['cart']); ?>)
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="font-weight-bold"><?=$userdata["username"]?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo url('profile'); ?>">Beállításaim</a>
          <a class="dropdown-item" href="<?php echo url('history'); ?>">Korábbi rendeléseim</a>
          <div class="dropdown-divider"></div>
          <?php if($userdata["role"] == "admin"): ?>
            <a class="dropdown-item" href="<?php echo url('admin_add_product'); ?>">Új termék felvitele</a>
            <a class="dropdown-item" href="<?php echo url('admin_list_products'); ?>">Termékek kezelése</a>
            <div class="dropdown-divider"></div>
            <a href="<?php echo url('admin_manage_users'); ?>" class="dropdown-item">Felhasználók kezelése</a>
            <div class="dropdown-divider"></div>
          <?php endif; ?>
          <a class="dropdown-item" href="<?php echo url('logout'); ?>">Kilépés</a>
        </div>
      </li>
      <?php else: ?>
      <li class="nav-item<?php echo $page == 'login' ? ' active' : ''; ?>">
        <a href="<?php echo url('login'); ?>" class="nav-link font-weight-bold">Bejelentkezés</a>
      </li>
      <?php endif; ?>
    </ul>
  </div>
</nav>