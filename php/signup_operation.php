<?php
session_start();
 include("connection.php");
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

     if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql_email_check = mysqli_query($conn, "SELECT * FROM usertable where email = '{$email}'");
            if (mysqli_num_rows($sql_email_check) > 0){
                echo "Email has been taken";
                } 
                else {
                if (isset($_FILES['image'])) {
                    $img_name = $_FILES['image']['name'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    $img_type = $_FILES['image']['type'];
                    // explode/seprate image name and extension into array then select extesion using end
                    $exp_img = explode('.', $img_name);
                    $img_ext = end($exp_img);
                    $valid_ext = ["png", "jpg", "jpeg"];

                    if (in_array($img_ext, $valid_ext)) {
                            $types = ["image/jpeg", "image/jpg", "image/png"];
                            if(in_array($img_type, $types) === true){
                            $time = time();
                            $new_img_name = $time.$img_name;
                         if(move_uploaded_file($tmp_name,"../resources/user_images/".$new_img_name)){
                            $ran_id = rand(time(), 100000000);
                            $status = "offline";
                        $sql = mysqli_query($conn, "INSERT INTO usertable (unique_id, fname, lname, email, password, image, active_status)
                            VALUES ({$ran_id}, '{$fname}','{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");
                           if($sql){
                                $fetch_query = mysqli_query($conn, "SELECT * FROM usertable where email = '{$email}'");
                                if (mysqli_num_rows($fetch_query) > 0){
                                    $row = mysqli_fetch_assoc($fetch_query);
                                    // $_SESSION['unique_id'] = $row['unique_id'];
                                    // echo"success";
                                    echo $rowzz;
                                }
                           } 
                           else {
                                 echo"error 404";
                           }
                    } 
                } 
                else {
                    echo "Only jpeg, jpg and png files allowed";
                } 

                } 
                else {
                    echo "Only jpeg, jpg and png files allowed";
                } 

             }
              else {
                echo "No image selected";
            }

        } 
      
     } 
     else {
        echo"Wrong email address";
    } 
    
     } 
     else {
        echo "All input fields are required";
     }
    

?>