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
  <h3>ID: <?= $user->id ?></h3>
  <h3>User Name: <?= $user->username ?></h3>
  <h3>Email: <?= $user->email ?></h3>
  <h3>Role: <?= $user->role ?></h3>
</main>

<!-- Start Footer -->
<?php require_once APPROOT.'/views/layouts/footer.php'; ?>
<!-- End Footer -->