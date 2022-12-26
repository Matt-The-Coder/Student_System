<?php


include_once("db.php");
$con = connection();
$search = $_GET["search"];
$sql = "SELECT * from userdata WHERE first_name LIKE '%$search%' or last_name LIKE '%$search%' order by id DESC";
$users = $con->query($sql) or die($con->error);
$row = $users->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Student Management System</title>
</head>
<body>
    <div class="container">
    <h1>Student Management System</h1>
</br>
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
    <th>Gender</th>
</tr>
</thead>
<tbody>
    <?php do { ?>
    <tr>
    <td><a href="">View </a></td>
    <td><?php echo $row["first_name"];?></td>
    <td><?php echo $row["last_name"];?></td>
    <td><?php echo $row["gender"];?></td>
</tr>
<?php }while($row = $users->fetch_assoc()); ?>


<?php 



?>
</tbody>
</table>
</div>
</body>
</html>