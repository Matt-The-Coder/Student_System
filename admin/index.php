<?php 

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION["user"])){

//connection and query
include("db.php");
$con = connection();

$sql = "SELECT * FROM userdata order by id desc";
$user = $con->query($sql) or die($con->connect_error);
$row = $user->fetch_assoc();
} else header("location:login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Student System</title>
</head>
<body>
    <div class="container">
        <center><h1>User's Data</h1></center>
        <a href="Add.php">Add Userdata</a>
        <br>
        <?php if (isset($_SESSION["user"])){?>
<a href="logout.php">Logout</a>
        <?php }?>

        <!-- form -->
        <form action="search.php" method="GET">
        <input type="text" name="search">
        <button type="submit">Search</button>
        </form>
        <!-- table data -->
    <table class="table table-striped">
        <!-- table header -->
<thead>
    <tr>
        <th></th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
    </tr>
</thead>
<tbody>
<!-- table body -->
    <tr><?php do { ?>
        <td><a href="details.php ?ID=<?php echo $row["id"] ?>"> View </a></td>
        <td><?php echo $row["first_name"]?></td>
        <td><?php echo $row["last_name"]?></td>
        <td><?php echo $row["email"] ?></td>
    </tr><?php } while ($row = $user->fetch_assoc())  ?>
</tbody>

    </table>

    </div>

</body>
</html>