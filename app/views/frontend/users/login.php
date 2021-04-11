<!DOCTYPE html>
<html>
  <head>
      <meta charset="UTF-8">
      <title>Login</title>
      <link rel="Stylesheet"  href="<?= URLROOT ?>/public/css/styleRegester.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  </head>
  <body>
    <div class="center" >   
      <div class= "header">Login</div>
      <form action="<?= URLROOT ?>/users/login" method="post">
        <input type="text" placeholder="Username" name="username" required>
        <span style="color: red;">
          <?= $data['usernameError'] ?>
        </span>
        <input type="password" placeholder="Password" name="password" required>
        <span style="color: red;">
          <?= $data['passwordError'] ?>
        </span>
        <input type ="submit" value="login"> 
        <p> Not yet Register  <a href="<?= URLROOT ?>/users/register">Register</a></p>
      </form>
    </div> 
  </body>      
</html>