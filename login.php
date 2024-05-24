<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login page</title>
  <link rel="stylesheet" href=".\css\login.css">
</head>

<body>
  <h1 class="heading">Music Recommendation</h1>
  <div class="container">
    <p class="login">Login</p>
    <form action="" method="post">
      <label for="user_id"></label>
      <input type="text" name="user_id" id="user_id" placeholder="ID" autocomplete='off' required>
      <br>
      <label for="user_pw"></label>
      <input type="password" name="user_pw" id="user_pw" placeholder="Password" autocomplete='off' required>
      <br>
      <input type="submit" name="submit" value="Login" class="submit">
    </form>
    <p class="signup">Click here to <a href="sign_up.php">Sign up</a></p>
  </div>
  <?php
    session_start();

    if(isset($_POST['submit'])){
      $user_id = $_POST['user_id'];
      $user_pw = $_POST['user_pw'];

      $db = mysqli_connect('localhost','root','') or die('Unable to connect');

      mysqli_select_db($db,'user_info') or die(mysqli_error($db));

      $query = "SELECT user_pw, user_nick FROM user WHERE user_id ='$user_id'";
      $result = mysqli_query($db,$query) or die(mysqli_error($db));

      if($result->num_rows > 0){
        $row = mysqli_fetch_array($result);
        if($user_pw == $row['user_pw']){
          $_SESSION['loginflag'] = 1;
          $_SESSION['user_id'] = $user_id;
          $_SESSION['user_nick'] = $row['user_nick'];
          header('Location: main.php');
        }
        else{
          echo '<script>alert("Invalid id or password, Try again")</script>';
        }
      }
      else{
        echo '<script>alert("Invalid id or password, Try again")</script>';
      }
    }
    
  ?>
</body>

</html>