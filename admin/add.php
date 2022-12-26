<?php 

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['user'])){
    if(isset($_POST['submit'])){
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $ip = $_POST['IPAddress'];
    
include_once("db.php");
$con = connection();
$sql = "INSERT into userdata (first_name, last_name, gender, email, ip_address)
 values ('$fname', '$lname', '$gender', '$email', '$ip')";
$user = $con->query($sql) or die($con->connect_error);
if (isset($user)){
    echo "Added Successfully";
}
    }
}else echo header("location: login.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Userdata</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <center><h1>Add Userdata</h1></center>
    
    <form action="" method="POST" >
    <div class="form-group"> 
 <label>Firstname</label>
 <input type="text" class="form-control" name="firstname" id="firstname" required placeholder="Enter Firstname">

 </div><div class="form-group">

 <label>Lastname</label>
 <input type="text" class="form-control" name="lastname" id="lastname" required placeholder="Enter Lastname">

    </div> <div class="form-group"> 

    <label>Email</label>
 <input type="email" class="form-control" name="email" id="email" required placeholder="Enter Email">

</div>  <div class="form-group"> 

<label>IP Address</label>
 <input type="text" name="IPAddress" class="form-control" id="IPAddress" required placeholder="Enter your IP Address">

</div>  <div class="dropup"> 

 <label>Gender</label>
 <select name="gender" required>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
 </select>

 </div>

<button  class="btn btn-success" type="submit" name="submit">Add Data</button>

    </form>
    


    <br></br>
    <a href="index.php"><--- Go back</a>
    
</body>
</html>