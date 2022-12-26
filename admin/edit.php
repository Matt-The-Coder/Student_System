<?php 
 if(!isset($_SESSION)){
    session_start();
 }
  if(isset($_SESSION["user"])){
    include("db.php");
    $id = $_GET['id'];
    $con2 = connection();
    $sql2 = "SELECT * from userdata where id = '$id'";
    $updated = $con2->query($sql2) or die($con->error);
    $row = $updated->fetch_assoc();


    if(isset($_POST['submit'])){
       
        $con = connection();
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $ip = $_POST['IPAddress'];
    $sql = "UPDATE userdata set first_name = '$fname', last_name = '$lname', 
    gender = '$gender', email = '$email', ip_address = '$ip' where id = '$id' ";
    $con->query($sql);
    echo header("location: index.php");
   

 }
}else echo header("location:login.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Edit Data</title>
</head>
<body>
    <center><h1>Edit your information</h1></center>
    <form action="" method="POST">

    <div class="form-group"> 
 <label>Firstname</label>
 <input type="text" class="form-control" value="<?php echo $row['first_name']?>" name="firstname" id="firstname" required placeholder="Enter Firstname">

 </div><div class="form-group">

 <label>Lastname</label>
 <input type="text" class="form-control" value="<?php echo $row['last_name']?>" name="lastname" id="lastname" required placeholder="Enter Lastname">

    </div> <div class="form-group"> 

    <label>Email</label>
 <input type="email" class="form-control" value="<?php echo $row['email']?>" name="email" id="email" required placeholder="Enter Email">

</div>  <div class="form-group"> 

<label>IP Address</label>
 <input type="text" name="IPAddress" value="<?php echo $row['ip_address']?>" class="form-control" id="IPAddress" required placeholder="Enter your IP Address">

</div>  <div class="dropup"> 

 <label>Gender</label>
 <select name="gender" value="<?php echo $row['gender']?>">
    <option value="Male">Male</option>
    <option value="Female">Female</option>
 </select>

 </div>

<button id="btn" class="btn btn-success" type="submit" name="submit">UPDATE</button>

    </form>

    <script src="js/update.js"></script>
</body>
</html>