<?php

session_start();
  if (!isset($_SESSION['unique_id'])) {
    header("location: index.php?no id");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to chatapp</title>
    <link rel="stylesheet" href="resources/css/user.css">
    <link rel="stylesheet" href="resources/fontawesome-free-5.15.4-web/css/all.min.css">
   
</head>
<body>

        <div class="wrapper">
          <section class="users">
            <header>
              <?php
                include "php/connection.php";
                $query = mysqli_query($conn, "SELECT * FROM usertable where unique_id = {$_SESSION['unique_id']}");
          
                if (mysqli_num_rows($query) > 0){
                  $row = mysqli_fetch_assoc($query);
                }
                ?>
              <div class="content">
                <img src="resources/user_images/<?php echo $row['image']; ?>" alt="">

                <div class="details">
                  <span><?php echo $row['fname']." ". $row['lname'];?></span>
                  <p><?php echo $row['active_status'];?></p>
                </div>
              </div>
              <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
            </header>
            <div class="search">
              <span class="text">Select a user to start chat</span>
              <input type="text" placeholder="Enter name to search...">
              <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">
        
            </div>
          </section>
        </div>
        <script src="js/users.js"></script>   
    </body>
</html>