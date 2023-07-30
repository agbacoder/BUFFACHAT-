<?php 
    session_start();
    include ("connection.php");
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if(!empty($email) && !empty($password)){
        $sql = mysqli_query($conn, "SELECT * FROM usertable WHERE email = '{$email}' AND password = '{$password}'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $status = 'Active now';
            $sqlquery = mysqli_query($conn, "UPDATE usertable SET active_status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                if ($sqlquery){
                    $_SESSION['unique_id'] = $row['unique_id'];
                    echo "success";
                } else {
                    echo "error! please try again";
                }
               
            }else{
                echo "Email or Password is Incorrect!";
            }
    }else{
        echo "All input fields are required!";
    }
?>