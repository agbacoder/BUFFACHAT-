<?php
include "resources/vendor/autoload.php";
$gclient = new Google_Client();
$gclient->setClientId("Your_client_id");
$gclient->setClientSecret("Your_secret");
$gclient->setApplicationName("App name");
$gclient->setRedirectUri("Your_redirect_file");
$gclient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

$login_url = $gclient->createAuthUrl();





?>
