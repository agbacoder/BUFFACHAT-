<?php
session_start();
include ("connection.php");
$outgoing_id = $_SESSION['unique_id'];
$sql = "SELECT * FROM usertable WHERE NOT unique_id = {$outgoing_id} ORDER BY id DESC";
$querydata = mysqli_query($conn, $sql);
$output = "";

if (mysqli_num_rows($querydata) == 0){
      $output .= "No available users to chat";
}  
else if (mysqli_num_rows($querydata) > 0){
   include "data.php";

}
echo $output;
?>