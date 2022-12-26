<?php 
if(!isset($_SESSION)){
    session_start();
}
// Connection and security
if(isset($_SESSION["user"])){
include("db.php");
$con = connection();
$id = $_GET["ID"];

$sql = "SELECT * FROM userdata where id = '$id'";
$user = $con->query($sql) or die($con->connect_error);
$row = $user->fetch_assoc();

}else echo header("location:login.php");

// HTML
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <center><h1 style="color: blue;">User's Profile</h1></center>
    <!-- edit -->
    <h4 style="display:inline;"><a href="edit.php ?id=<?php echo $id?>">Edit</a></h4>
    <!-- delete -->
    <h4 id="delete" style="display:inline;"><a href="delete.php ?id=<?php echo $id ?>">Delete</a></h4>
    <!-- User Data -->
    <h3>ID No. <?php if (!isset($row['id'])) {echo "No Data Found";}else echo $row['id'] ?></h3>
    <h3>Name: <?php if(!isset($row['first_name'], $row['last_name'])){echo "No Data Found";} else echo $row['first_name']." ". $row['last_name']?></h3>
    <h3>Gender: <?php if (!isset($row['gender'])) {echo "No Data Found";} else echo $row['gender']?></h3>
    <h3>Email: <?php if(!isset($row['email'])){echo "No Data Found";} else echo $row['email']?></h3>
    <h3>IP Address: <?php if (!isset($row['ip_address'])) {echo "No Data Found";}else echo $row['ip_address'] ?></h3>
    <!-- Back to home -->
    <a href="index.php"><---- Go Back.</a>
    <script src="js/delete.js"></script>
</body>
</html>
