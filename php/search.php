<?php
session_start();
include "connection.php";
$outgoing_id = $_SESSION['unique_id'];
$searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
$sql = "SELECT * FROM usertable where NOT unique_id = {$outgoing_id} AND fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%'";
$querydata = mysqli_query($conn, $sql);
$output = "";


if (mysqli_num_rows($querydata) > 0) {
    include ("data.php");
}
else {
    $output .= "User not found";
}
echo $output;

?>