<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="index3.html" class="brand-link">
    <img src="public\backend\images\e-store-logo.png" alt="E Store" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">E Store</span>
  </a>
  <div class="sidebar">
    <div class="form-inline mt-2">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">SYSTEM</li>
        <li class="nav-item">
          <a href="dashboard" class="nav-link <?= $page == "dashboard" ? "active" : "" ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-right"></i>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Users
              <i class="right fas fa-angle-right"></i>
            </p>
          </a>
        </li>
        <li class="nav-header">MANAGEMENT</li>
        <li class="nav-item">
          <a href="products" class="nav-link <?= $page == "products" ? "active" : "" ?>">
            <i class="nav-icon fas fa-box-open"></i>
            <p>
              Products
              <i class="right fas fa-angle-right"></i>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Categories
              <i class="right fas fa-angle-right"></i>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-shopping-cart"></i>
            <p>
              Orders
              <span class="badge badge-danger right">10</span>
            </p>
          </a>
        </li>
        <li class="nav-header">SUPPORT</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-id-card"></i>
            <p>
              Contacts
              <span class="badge badge-info right">2</span>
            </p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>