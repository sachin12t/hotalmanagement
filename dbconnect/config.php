<?php
$localhost = "localhost";
$user = "root";
$pass = "";
$database = "hotelmanagement";

// Create connection
$con = mysqli_connect($localhost, $user, $pass, $database);

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
?>