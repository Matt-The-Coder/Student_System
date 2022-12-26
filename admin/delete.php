<?php
if(!isset($_SESSION)){
    session_start();
} 
include("db.php");
if(isset($_SESSION['user'])){

$con = connection();
$con2 = connection();
$id = $_GET["id"];

$sql = "DELETE from USERDATA where id = '$id'";
$con->query($sql) or die($con->error); 
$sql2 = "SELECT * from USERDATA where id = '$id'";
$deleted = $con2->query($sql2) or die($con->error);
$result = $deleted->num_rows;
if($result<1){
    echo "DELETED SUCCESSFULLY!";
}else echo "THERE IS AN ERROR";



}else echo header("location:login.php");



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletion</title>
</head>
<body>
    <br></br>
    <a href="index.php"><---Go Back</a>
    
</body>
</html>