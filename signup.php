
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
        <section class="form signup">
          <header>BuffaChat</header>
          <form action="" method="POST" enctype="multipart/form-data" autocomplete="on">
            <div class="error-text">this is an error!</div>
            <div class="name-details">
              <div class="field input">
                <label>First Name</label>
                <input type="text" name="fname" placeholder="First name">
              </div>
              <div class="field input">
                <label>Last Name</label>
                <input type="text" name="lname" placeholder="Last name" >
              </div>
            </div>
            <div class="field input">
              <label>Email Address</label>
              <input type="text" name="email" placeholder="Enter your email">
            </div>
            <div class="field input">
              <label>Password</label> <i class="fas fa-eye-slash"></i>
              <input type="password" id="pass" name="password" placeholder="Enter new password">
              
            </div>
            <div class="field image">
              <label>Select Image</label>
              <input type="file" name="image">
            </div>
            <div class="field button">
              <input type="submit" name="submit" value="Sign Up">
            </div>
          </form>
          <div class="link">Already signed up? <a href="index.php">Login now</a></div>
        </section>
      </div>
     
    <script src="js/indice.js"></script>
    <script src="js/signup.js"></script>
</body>
</html>