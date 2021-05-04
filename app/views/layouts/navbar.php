<?php
require_once '../app/helpers/Session.php';
?>


<nav class="navbar-expand-lg navbar">
    <div class="container-fluid header">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse container m-auto navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item" style=" font-size : 25px ; color:#0d47a1">
                    <a class="nav-link" href="<?= URLROOT ?>">E-STORE</a>

                </li>

            </ul>
            <form class="me-auto search-header" action="" method="POST">
                <input class="form-control me-2 input" type="search" placeholder="Search item" aria-label="Search">
                <!--<button class="btn" class="form-control"  type="submit"></button>-->
                <input class="btn" value="search" type="submit">
            </form>
            <ul class="mb-2 mb-lg-0" style="display: flex">
                <button class="btn">
                    <i class="fa fa-shopping-cart">
                        <span id="cartBage" class="bage"> 0</spa>
                    </i>
                    Cart
                </button>

                <?php if(!isset($user)) : ?>
                <span>
                    <a class="btn" href="<?= URLROOT ?>/users/login">
                        <i class="fa fa-user" style="margin-right:8px"></i>
                        Login
                    </a>
                </span>
                <span>
                    <a class="btn" href="<?= URLROOT ?>/users/register">
                        <i class="fa fa-user-plus" style="margin-right:8px"></i>
                        Register
                    </a>
                </span>

                <?php else : ?>

                <?php if(strcmp($user->role, 'admin') == 0) : ?>
                <a class="btn" href="<?= URLROOT ?>/dashboard">
                    <i class="fa fa-user" style="margin-right:8px"></i>
                    Dashboard
                </a>
                <?php else : ?>
                <a class="btn" href="<?= URLROOT ?>/users/profile">
                    <i class="fa fa-user" style="margin-right:8px"></i>
                    My Account
                </a>
                <?php endif ?>

                <a class="btn" href="<?= URLROOT ?>/users/logout">
                    <i class="fas fa-sign-out-alt" style="font-size:20px"></i>
                </a>
                <?php endif ?>


            </ul>
        </div>
    </div>
    <script>

    </script>
</nav>
<!-- Main Navigation -->

<!--<header>
  <!--<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?= URLROOT ?>">E-Store</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= URLROOT ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= URLROOT ?>/products" tabindex="-1" aria-disabled="true">Products</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categories
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Category 1</a></li>
              <li><a class="dropdown-item" href="#">Category 2</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">All Categories</a></li>
            </ul>
          </li>

        </ul>

        <ul class="navbar-nav mb-2 mb-lg-0">
        <?php if(!isset($user)) : ?>
        <li class="nav-item">
          <a href="<?= URLROOT ?>/users/login" class="btn btn-sm btn-outline-secondary" type="button">Sign In</a>
        <li>
        <li class="nav-item ms-3">
          <a href="<?= URLROOT ?>/users/register" class="btn btn-sm btn-success" type="button">Sign Up</a>
        <li>

        <?php else : ?>
        <li class="nav-item ms-3">
          <a href="<?= URLROOT ?>/users/logout" class="btn btn-sm btn-danger" type="button">Sign Out</a>
        <li>
        <?php endif ?>

        </ul>
      </div>
    </div>
    
  
  </nav>-->


<!--</header>-->