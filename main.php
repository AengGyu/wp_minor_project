<!DOCTYPE html>
<?php
  session_start();
  if(!isset($_SESSION['loginflag'])||$_SESSION['loginflag']!=1){
    echo '<script>alert("Sorry, you have to log in to use this page.");
    window.location.href="login.php";
    </script>';
  }
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main</title>
  <link rel="stylesheet" href=".\css\main.css">
</head>
<body>
  <div>
    <header>
      <h1><a href="main.php">Music Recommnedation</a></h1>
      <?php
        $user_id = $_SESSION['user_id'];
        
        $db = mysqli_connect('localhost','root','') or die('Unable to connect');
        
        mysqli_select_db($db,'user_info') or die(mysqli_error($db));

        $query = "SELECT user_nick
        FROM user
        WHERE user_id = '$user_id'";

        $result = mysqli_query($db,$query) or die(mysqli_error($db));

        if($result->num_rows > 0){
          $row = mysqli_fetch_array($result);
          $user_nick = $row['user_nick'];
        }
        echo "Welcome, '$user_nick'";
        echo '<br>';
      ?>
      <form action="" method="post">
        <input type="submit" name="logout" value="LOGOUT">
      </form>
    </header>
    <div class="nav">
      <ul>
        <li><a href="post.php">POST</a></li>
        <li><a href="search_singer.php">SINGER</a></li>
        <li><a href="search_categories.php">CATEGORIES</a></li>
        <li><a href="mypage.php">MY PAGE</a></li>
      </ul>
    </div>
    <footer>
      <?php
        $today = date('Y/m/d');
        echo $today;
      ?>
      <br>
      <p>Made by Choi Young Gyu</p>
   </footer>
  </div>
  <?php
  if(isset($_POST['logout'])){
    session_destroy();
    echo '<script>
    alert("Logged out successfully.");
    window.location.href="login.php";
    </script>';
  }
  ?>
</body>
</html>