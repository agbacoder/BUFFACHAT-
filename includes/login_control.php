<?php
include "../config.php";
include '../autoloader.php';





if (isset($_GET['code'])) {
      $token = $gclient->fetchAccessTokenWithAuthCode($_GET['code']);
      if(isset($token["error"]) != "invalid_grant"){
        $oAuth = new Google_Service_Oauth2($gclient);
        $userdata = $oAuth->userinfo->get();
        
    
        $fname = $userdata['givenName'];
        $lname = $userdata['familyName'];
        $img = 'user_icon.png';
        $email = $userdata['email'];
        $user_id = rand(time(), 1000000);
        $status = "Active Now";

        
        
       
       
    
        $log_cont = new LoginContr($fname, $lname, $img, $email, $user_id, $status);
    
       
    
        if ($log_cont->signinUser() === true){
            $log_cont->loginUser();
            header('location: ../users.php?login_succesful');

        } else {
            header('location:  ../users.php?email_taken');
            $log_cont->loginUser();
        }
        
       
    }
    else {
        header('location: ../index.php?invalid code');
        die();
    }
} else {
    header('location: ../index.php?no code');
    exit();
}


?>