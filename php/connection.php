<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "users";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if(!$conn){
  $error=mysqli_connect_error();
    echo "
      <script>alert('$error');</script>
    ";
  }
?>