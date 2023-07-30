<?php 
 session_start();
if(isset($_SESSION['unique_id'])){
  header("location: users.php");
}
include 'config.php';
include 'autoloader.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chatApp</title>
    <link rel="stylesheet" href="resources/css/chat.css">
    <link rel="stylesheet" href="resources/fontawesome-free-5.15.4-web/css/all.min.css">
   
</head>
<body>
    <div class="wrapper">
        <section class="form login">
          <header>BuffaChat</header>
          <form action="" method="POST" enctype="multipart/form-data" autocomplete="on">
            <div class="error-text"></div>
            <div class="field input">
              <label>Email Address</label>
              <input type="text" name="email" placeholder="Enter your email">
            </div>
            <div class="field input pass">
              <label>Password</label>
              <input type="password" name="password" id="pass" placeholder="Enter your password">
              <i class="fas fa-eye-slash"></i>
            </div>
            <div class="field button">
              <input type="submit" name="submit" value="Login">
            </div>
            <div class="area clicker">
              <input type="button" name="login" onclick="window.location = '<?php echo $login_url;?>'" value="Google Login">
            </div>
          </form>
          <div class="link">Not yet signed up? <a href="signup.php" >Signup now</a></div>
        </section>
      </div>
    <script src="js/indice.js"></script>
    <script src="js/login.js"></script>
   
</body>
</html>