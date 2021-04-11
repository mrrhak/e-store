<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
        <link rel="Stylesheet"  href="<?= URLROOT ?>/public/css/styleRegester.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    </head>
    <body>
        <div class="center" >   
            <div class= "header">Register</div>
            <form name="" action="<?= URLROOT ?>/users/register" method="post">
                <input type ="text" name="username" placeholder="Username" required>
                <span style="color: red;">
                  <?= $data['usernameError'] ?>
                </span>
                <input type ="email" name="email" placeholder="Email" required>
                <span style="color: red;">
                  <?= $data['emailError'] ?>
                </span>
                <input type="password" name="password" placeholder="Password" required>
                <span style="color: red;">
                  <?= $data['passwordError'] ?>
                </span>
                <input type="password" name="confirmPassword" placeholder="Confirm Password" required>
                <span style="color: red;">
                  <?= $data['confirmPasswordError'] ?>
                </span>
                <input type ="submit" value="Create">
                <div>
                    <p>Already login?<a href="<?= URLROOT ?>/users/login"> Login</a></p>
                </div>
            </form>  
        </div>
    </body>      
</html>


    <!-- <div class="m-5 d-block">
      <h2>Register</h2>
        <form class="d-block" action="<?= ''//URLROOT ?>/users/register" method="post">
          <input type="text" placeholder="Username" name="username" required>
          <span>
            <?= ''//$data['usernameError'] ?>
          </span>
          <input type="email" placeholder="Email" name="email" required>
          <span>
            <?= ''//$data['emailError'] ?>
          </span>
          <input type="password" placeholder="Password" name="password" required>
          <span>
            <?= ''//$data['passwordError'] ?>
          </span>
          <input type="password" placeholder="Confirm Password" name="confirmPassword" required>
          <span>
            <?= ''//$data['confirmPasswordError'] ?>
          </span>
          <button type="submit" id="submit" value="submit">Create</button>
          <p>Already have an account? <a href="<?= ''//URLROOT ?>/users/login">Login!</a></p>
        </form>
    </div> -->