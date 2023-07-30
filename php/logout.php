<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include "connection.php";
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
        if(isset($logout_id)){
            $status = "Offline now";
            $sql = mysqli_query($conn, "UPDATE usertable SET active_status = '{$status}' WHERE unique_id= {$_GET['logout_id']}");
            if($sql){
                session_unset();
                session_destroy();
                header("location: ../index.php");
            }
        }else{
            header("location: ../index.php");
        }
    }else{  
        header("location: ../index.php");
    }
?>