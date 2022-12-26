<?php 

function connection(){
    $host = "localhost";
    $user = "Matthew";
    $password = "ashlynkay17";
    $database = "Student_system";

    $con = new mysqli($host, $user, $password, $database);
    if($con->connect_error){
        echo $con->connect_error;
    } else return $con;

}




?> 