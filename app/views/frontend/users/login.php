<?php
  /*
  * Login
  */

  // Start Header
  require_once APPROOT.'/views/layouts/header.php';
  // End Header
?>
<!-- Begin page content -->
  <div class="container">
    <div class="m-5">
      <h2>Sign In</h2>
        <form action="<?= URLROOT ?>/users/login" method="post">
          <input type="text" placeholder="Username" name="username" required>
          <span>
            <?= $data['usernameError'] ?>
          </span>
          <input type="password" placeholder="Password" name="password" required>
          <span>
            <?= $data['passwordError'] ?>
          </span>
          <button type="submit" id="submit" value="submit">Login</button>
          <p>Not registered yet? <a href="<?= URLROOT ?>/users/register">Create an account!</a></p>
        </form>
    </div>
  </div>
 

<!-- Start Footer -->
<?php require_once APPROOT.'/views/layouts/footer.php'; ?>
<!-- End Footer -->