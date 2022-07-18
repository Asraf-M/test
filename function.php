<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "registrationdb");

// IF
if(isset($_POST["action"]))
{
  if($_POST["action"] == "register")
  {
    register();
  }
  else if($_POST["action"] == "login")
  {
    login();
  }
  else if($_POST["action"] == "update")
  {
    update();
  }
}

// REGISTER
function register()
{
  global $conn;

  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];

  if(empty($name) || empty($username) || empty($password) || empty($email) )
  {
    echo "Please Fill Out The Form!";
    exit;
  }
 
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
  {
    echo "Invalid email format";
    exit;
  }





  $stmt = $conn->prepare("SELECT * FROM tb_user WHERE email = ?"); 
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if(mysqli_num_rows($result) > 0)
  {
    echo "email Has Already Taken";
    exit;
  }


  $stmt = $conn->prepare("INSERT INTO tb_user (name, username, password,email) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $name, $username, $password, $email);

  $stmt->execute();
  $stmt->close();
  $conn->close();
  echo "Registration Successful";
  exit;




}

// LOGIN
function login(){
  global $conn;

  $email = $_POST["email"];
  $password = $_POST["password"];



  $stmt = $conn->prepare("SELECT * FROM tb_user WHERE email = ?"); 
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();
  if(mysqli_num_rows($result) > 0)
  {
    $row = mysqli_fetch_assoc($result);

    if($password == $row['password'])
    {
      echo "Login Successful";
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      $_SESSION["name"] = $row["name"];
      $_SESSION["username"] = $row["username"];
      $_SESSION["password"] = $row["password"];
      $_SESSION["email"] = $row["email"];
    }

    else
    {
      echo "Wrong Password";
      exit;
    }

  }

  else
  {
    echo "User Not Registered";
    exit;
  }

}


//UPDATE
function update()
{  
  global $conn;
  $id = $_POST["id"];
  $name = $_POST["name"];
  $username = $_POST["username"];
  $password = $_POST["password"];



  $_SESSION["id"] = $id;
  $_SESSION["name"] = $name;
  $_SESSION["username"] = $username;
  $_SESSION["password"] = $password;



 
  $stmt = $conn->prepare("UPDATE tb_user SET name = ?, username = ? , password = ? WHERE id = ?");
  $stmt->bind_param("ssss", $name, $username, $password, $id);
  $stmt->execute();
  $stmt->close();

  echo "Updated Successful";
  exit;
}


?>
