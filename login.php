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
  <title>Login</title>
</head>



<h1 style="text-align:center ;">LOGIN</h1>
<form action='' method="POST">
  <input type="hidden" id="action" value="login">
<!----------
  <div class="form-group">
    <label for="">Username</label>
    <input type="text" class="form-control col-md-6" id="username"  placeholder="Enter Username">
  </div>
---------->
  <div class="form-group">
    <label for="">E-mail</label>
    <input type="email" class="form-control col-md-6" id="email"  placeholder="Enter email">
  </div>

  <div class="form-group">
    <label for="">Password</label>
    <input type="password" class="form-control col-md-6" id="password" placeholder="Enter Password">
  </div>

  <button type="button" class="btn btn-primary" onclick="submitData();">Login</button>
  <a href="register.php">Go To Register</a>
</form>


<?php require 'script.php'; ?>


</html>
