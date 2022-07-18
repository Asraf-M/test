

<link rel="stylesheet" href="style.css">

<?php
require 'function.php';
if (isset($_SESSION["id"])) {
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Register</title>
</head>

<body>

<h1 class="center">USER  REGISTRATION</h1>
<form action='' method="POST">

  <input type="hidden" id="action" value="register">

  <div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control col-md-6" id="name"  placeholder="Enter Name" required>
  </div>

  <div class="form-group">
    <label for="">Username</label>
    <input type="text" class="form-control col-md-6" id="username"  placeholder="Enter Username" required>
  </div>

  <div class="form-group">
    <label for="">E-mail</label>
    <input type="email" class="form-control col-md-6" id="email"  placeholder="Enter E-mail" required> 
  </div>

  <div class="form-group">
    <label for="">Password</label>
    <input type="password" class="form-control col-md-6" id="password" placeholder="Enter Password" required>
  </div>

  <button type="button" class="btn btn-primary" onclick="submitData();">Register</button> 
  <a href="login.php">Go To Login</a>
</form>



  <?php require 'script.php'; ?>
</body>

</html>