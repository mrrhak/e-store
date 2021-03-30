<?php
require_once '../app/helpers/Session.php';
?>

<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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

        //TODO: Check user
        <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a href="<?= URLROOT ?>/users/login" class="btn btn-sm btn-outline-secondary" type="button">Sign In</a>
        <li>
        <li class="nav-item ms-3">
          <a href="<?= URLROOT ?>/users/register" class="btn btn-sm btn-success" type="button">Sign Up</a>
        <li>

        <li class="nav-item ms-3">
          <a href="<?= URLROOT ?>/users/logout" class="btn btn-sm btn-danger" type="button">Sign Out</a>
        <li>

        </ul>
      </div>
    </div>
  </nav>
</header>