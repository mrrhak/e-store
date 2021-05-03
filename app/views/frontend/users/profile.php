<?php
  /*
  * Home Page
  */

  // Past to header
  //echo $data['title'];

  // Start Header
  require_once APPROOT.'/views/layouts/header.php';
  // End Header
?>

<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          <h2 class="text-center m-4" style="font-size: 40px;">User Account</h2>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h3 class="text-uppercase"><?= $user->username ?></h3>
                      <p class="text-secondary mb-1"><?= $user->role ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <a class="btn btn-danger" href="<?= URLROOT ?>/users/logout">Logout</a>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Username</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $user->username ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $user->email ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      (239) 816-9029
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address 1</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      Phnom Penh
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address 2</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      Bay Area, San Francisco, CA
                    </div>
                  </div>
                </div>
              </div>
              <div class="row gutters-sm">
                <div class="col-12">
                <h3 class="text-center mt-4">Checkout History</h3>
                  <div class="card mb-4">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3">Date: 01/01/2021</h6>
                      <small>Checkout 1</small>
                    </div>
                  </div>
                  <div class="card mb-4">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3">Date: 01/01/2021</h6>
                      <small>Checkout 2</small>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
    </div>
</main>

<!-- Start Footer -->
<?php require_once APPROOT.'/views/layouts/footer.php'; ?>
<!-- End Footer -->