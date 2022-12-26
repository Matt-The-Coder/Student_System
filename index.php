<?php 


include_once("db.php");
$con = connection();

$sql = "SELECT * FROM userdata order by id desc";
$user = $con->query($sql) or die($con->connect_error);
$row = $user->fetch_assoc();

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
        
        <form action="search.php" method="GET">
        <input type="text" name="search">
        <button type="submit">Search</button>
        </form>
    <table class="table table-striped">
<thead>
    <tr>
        <th></th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
    </tr>
</thead>
<tbody>
    <tr><?php while ($row = $user->fetch_assoc()) { ?>
        <td><a href="index.php"> View </a></td>
        <td><?php echo $row["first_name"]?></td>
        <td><?php echo $row["last_name"]?></td>
        <td><?php echo $row["email"] ?></td>
    </tr><?php } ?>
</tbody>

    </table>

    </div>

    <?php 
    // while($row = $user->fetch_assoc()) {
    //     echo $row["first_name"]." ".$row["last_name"]." ";
    // }
    
    
    ?>
</body>
</html>