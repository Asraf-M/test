
<link rel="stylesheet" href="style.css">

<?php
require 'script.php';
?>

<?php
require 'function.php';


if (isset($_SESSION["id"])) 
{
  $id = $_SESSION["id"];

  $stmt = $conn->prepare("SELECT * FROM tb_user WHERE id = ?");
  $stmt->bind_param("s", $id);
  $stmt->execute();
  $result = $stmt->get_result();

  if (mysqli_num_rows($result) > 0) 
  {
    $user = mysqli_fetch_assoc($result);
    file_put_contents('myfile.json', json_encode($user));

  }
} 
else
{
  header("Location: login.php");
}
?>

<a type="button" class="btn btn-primary float-right" href="logout.php" target="_blank">Logout</a>

<h1 class="center">Welcome <?php  echo $user["name"];   ?></h1>

<table class="table table-borderless">


  <tr>
    <th scope="row">ID</th>
    <th scope="row"><?php echo $user["id"]; ?></th>
  </tr>

  <tr>
    <th scope="col">NAME</th>
    <td> <?php echo $user["name"]; ?></td>
  </tr>

  <tr>
    <th scope="col">USERNAME</th>
    <td> <?php echo $user["username"]; ?></td>
  </tr>

  <tr>
    <th scope="col">E-MAIL</th>
    <td> <?php echo $user["email"]; ?></td>
  </tr>

  <tr>
    <th scope="col">PASSWORD</th>
    <td> <?php echo $user["password"]; ?></td>
  </tr>

  <tr>
    <td><a type="button" href="edit.php" class="btn btn-primary" >EDIT</a></td>
  </tr>



</table>