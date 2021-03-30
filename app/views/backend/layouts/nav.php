<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <h2><a href="#" class="text-secondary">E-Store Management</a></h2>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>

    <li class="nav-item dropdown">
      <a class="d-flex align-items-center nav-link" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
        <img src="public/backend/images/profile.jpg" class="img-circle elevation-1" alt="user avatar" width="35" height="35" style="object-fit: cover;" />
        <div class="user-info pl-2">
          <p class="user-name my-0 text-dark"><?= strtoupper($user->username) ?></p>
          <small class="designattion my-0"><?= ucfirst($user->role) ?></small>
        </div>
      </a>

      <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
        <span class="dropdown-item dropdown-header">ACCOUNT</span>
        <div class="dropdown-divider"></div>
        <a href="auth/logout" class="dropdown-item">
          <i class="fas fa-sign-out-alt mr-2"></i>
          <span>Logout</span>
        </a>
      </div>
      
    </li>

    <!-- <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
      </a>
    </li> -->
  </ul>
</nav>