
<?php
  session_start();
  if (!isset($_SESSION['unique_id'])) {
    header("location: index.php");
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BuffaChat</title>
    <link rel="stylesheet" href="resources/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="resources/css/users.css">
</head>
<body>
        <div class="user">
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
       
    <div class="chatapp">
    <?php
                include "php/connection.php";
                $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                $query = mysqli_query($conn, "SELECT * FROM usertable where unique_id = {$user_id}");
               
                if (mysqli_num_rows($query) > 0){
                  $row = mysqli_fetch_assoc($query);
                }
                ?>
      <section class="chat-area">
        <header>
          <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
          <img src="resources/user_images/<?php echo $row['image']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['fname']." ". $row['lname'];?></span>
            <p><?php echo $row['active_status'];?></p>
          </div>
        </header>
        <div class="chat-box">

        </div>
        <form action="#" class="typing-area">
          <input type="text" class="" name="outgoing_id" value="<?php echo $_SESSION['unique_id'];?>" hidden>
          <input type="text" class="" name="incoming_id" value="<?php echo $user_id;?>" hidden>
          <input type="text" name="message" id="input-field" placeholder="Type a message here..." autocomplete="off">
          <button><i class="fab fa-telegram-plane"></i></button>
        </form>
      </section>
    </div>
    <script src="js/chatuse.js"></script> 
    <script src="js/chat.js"></script>
  
  </body>
  </html>
  