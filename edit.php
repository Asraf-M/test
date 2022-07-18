
<link rel="stylesheet" href="style.css">

<?php
session_start();
echo "asraf  : ".$_SESSION['id']."<br>";
echo "asraf  : ".$_SESSION['name']."<br>";
echo "asraf  : ".$_SESSION['username']."<br>";
echo "asraf  : ".$_SESSION['password']."<br>";

?>


<body>
    <h1 class="center">UPDATE</h1>
    <form  action="" method="post">

        <input type="hidden" id="action" value="update">
        <input type="hidden" id="id" value=<?php echo $_SESSION['id']; ?>> <br>

        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control col-md-6" id="name" placeholder="Enter Name" value=<?php echo $_SESSION['name']; ?>>
        </div>

        <div class="form-group">
            <label for="">Username</label>
            <input type="text" class="form-control col-md-6" id="username" placeholder="Enter Username" value=<?php echo $_SESSION['username']; ?>>
        </div>

        <div class="form-group">
            <label for="">Password</label>
            <input type="text" class="form-control col-md-6" id="password" placeholder="Enter Password" value=<?php echo $_SESSION['password']; ?>>
        </div>

        <button type="button" class="btn btn-primary"  onclick="submitUpdatedData();">Update</button>
    </form>
    <br>
  
</body>


<?php require 'script.php'; ?>