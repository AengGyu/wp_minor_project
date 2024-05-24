<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Page</title>
  <link rel="stylesheet" href=".\css\mypage.css">
</head>
<body>
  <h1 class="heading"><a href="main.php">Music Recommendation</a></h1>
  <div class="container">
    <p class="mypage">My page</p>
    <?php
        session_start();
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
        echo "<p>User ID : $user_id</p>";
        echo "<p>User Nickname : $user_nick</p>";
      ?>
    <form action="" method="post">
      <p class="change">Change nickname</p>
      <label for="new_nick"></label>
      <input type="text" name="new_nick" id="new_nick" autocomplete="off" placeholder="New nickname" required>
      <input type="submit" name="change_nick" value="Change">
    </form>
    <form action="" method="post">
      <p class="change">Change password</p>
      <label for="new_pw"></label>
      <input type="password" name="new_pw" id="new_pw" autocomplete="off" placeholder="New password" required>
      <input type="submit" name="change_pw" value="Change">
    </form>
    <button onclick="location.href='main.php'">Home</button>
    <!-- <p class="cancel">(If you want to cancel, click site name.)</p> -->
  </div>
  <?php
    if(isset($_POST['change_nick'])){
      $user_id = $_SESSION['user_id'];
      $new_nick = $_POST['new_nick'];

      $db = mysqli_connect('localhost','root','') or die('Unable to connect');

      mysqli_select_db($db,'user_info') or die(mysqli_error($db));

      $query = "UPDATE user
      SET user_nick = '$new_nick'
      WHERE user_id = '$user_id'";
      
      mysqli_query($db,$query) or die(mysqli_error($db));

      echo '<script>
      alert("Nickname is changed sucessfully");
      window.location.href="mypage.php";  
      </script>';
    }
    if(isset($_POST['change_pw'])){
      $user_id = $_SESSION['user_id'];
      $new_pw = $_POST['new_pw'];

      $db = mysqli_connect('localhost','root','') or die('Unable to connect');

      mysqli_select_db($db,'user_info') or die(mysqli_error($db));

      $query = "UPDATE user
      SET user_pw = '$new_pw'
      WHERE user_id = '$user_id'";
      
      mysqli_query($db,$query) or die(mysqli_error($db));

      echo '<script>
      alert("Password is changed sucessfully");
      </script>';
    }
  ?>
</body>
</html>