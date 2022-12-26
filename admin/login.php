<?php
if(!isset($_SESSION)){
    session_start();
}

include("db.php");
$con = connection();
if(isset($_POST["submit"])){

    $user = $_POST["username"];
    $pass = $_POST["password"];

    $sql = "SELECT * from admin where username = '$user' and password = '$pass'";
    $admin = $con->query($sql);
    $row = $admin->fetch_assoc();
    $result = $admin->num_rows;
if($result>0){
    $_SESSION["user"] = $row["username"];
    $_SESSION["pass"] = $row["password"];
    echo header("location:index.php");
}else echo "No user exists";

}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Login</title>
</head>
<body>
    <br>
</br>
        <form action="" method="POST">
        <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username" required>
        </div> <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" id="password" required placeholder="Enter Password">
        </div>
        <center><button class="btn btn-success" name="submit">Login</button></center>
        </form>
   
</body>
</html>