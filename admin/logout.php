<?php 
session_start();

session_unset();
echo header("location:login.php");
?>