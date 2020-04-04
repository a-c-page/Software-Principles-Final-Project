<?php
session_start();
if (isset($_SESSION["message"])) {
  echo "<script type='text/javascript'> alert("."'".$_SESSION["message"]."'"."); </script>";
}
unset($_SESSION['message']);
session_destroy();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <script src="script.js" charset="utf-8"></script>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Dosis&display=swap" rel="stylesheet">
  </head>
  <body>

    <div class="title">
        <h1>Rummy-O</h1>
    </div>

    <div class="tabs">
      <button type="button" name="login" class="active" id="left-tab" onclick="loginTab()">Login</button>
      <button type="button" name="register" class="" id="right-tab" onclick="regTab()">Register</button>
    </div>

    <div class="content" id="login-c">
      <h1>Login</h1>
      <form name="login" class="" action="checkLogin.php" method="post">
        Username<input type="text" name="username" value="" required pattern="[A-Za-z0-9]{3,}" title="Username can only contain leters and numbers, and must be at least 3 characters long.">
        Password<input type="password" name="password" value="" required pattern="[A-Za-z0-9]{3,}" title="Password can only contain leters and numbers, and must be at least 3 characters long.">
        <button type="submit" name="submit" id="submit">Login</button>
      </form>
    </div>

    <div class="content hidden" id="register-c">
      <h1>Register</h1>
      <form name="login" class="" action="checkRegistration.php" method="post">
        First Name<input type="text" name="first" value="" required pattern="[A-Za-z]+" title="First name can only contain letters.">
        Last Name<input type="text" name="last" value="" required pattern="[A-Za-z]+" title="Last name can only contain letters.">
        Username<input type="text" name="username" value="" required pattern="[A-Za-z0-9]{3,}" title="Username can only contain leters and numbers, and must be at least 3 characters long.">
        Email<input type="email" name="email" value="">
        Password<input type="password" name="password" value="" required pattern="[A-Za-z0-9]{3,}" title="Password can only contain leters and numbers, and must be at least 3 characters long.">
        <button type="submit" name="submit" id="submit">Register</button>
      </form>
    </div>

  </body>
</html>
