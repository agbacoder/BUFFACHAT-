<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == ($_SERVER[SCRIPT_FILENAME])){
    header('HTTP/1.0 404 Not Found', TRUE, 404);
    die(header('location: ../index.php'));

}


include "login_control.php";
   
  
   

     $log_cont->loginUser();

     if ( $log_cont->loginUser()){
        // header('location: ../users.php?succesful login');
         echo 'success';

     }
     











?>