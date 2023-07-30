<?php
include "resources/vendor/autoload.php";
$gclient = new Google_Client();
$gclient->setClientId("504383280868-ve3eo7pt95s7cidr3r4asl367usl7n31.apps.googleusercontent.com");
$gclient->setClientSecret("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");
$gclient->setApplicationName("Chat app regen");
$gclient->setRedirectUri("http://localhost/chat%20app%20regen/includes/login_control.php");
$gclient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

$login_url = $gclient->createAuthUrl();





?>