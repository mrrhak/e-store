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
      <h2>Register</h2>
        <form action="<?= URLROOT ?>/users/register" method="post">
          <input type="text" placeholder="Username" name="username" required>
          <span>
            <?= $data['usernameError'] ?>
          </span>
          <input type="email" placeholder="Email" name="email" required>
          <span>
            <?= $data['emailError'] ?>
          </span>
          <input type="password" placeholder="Password" name="password" required>
          <span>
            <?= $data['passwordError'] ?>
          </span>
          <input type="password" placeholder="Confirm Password" name="confirmPassword" required>
          <span>
            <?= $data['confirmPasswordError'] ?>
          </span>
          <button type="submit" id="submit" value="submit">Create</button>
          <p>Already have an account? <a href="<?= URLROOT ?>/users/login">Login!</a></p>
        </form>
    </div>
  </div>
 

<!-- Start Footer -->
<?php require_once APPROOT.'/views/layouts/footer.php'; ?>
<!-- End Footer -->