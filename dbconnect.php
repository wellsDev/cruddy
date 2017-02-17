<?php
//mysql database connection
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_crud";
$con = mysqli_connect($host, $user, $pass, $db) or die("Error " . mysqli_error($con));
?>
