<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign up</title>
  <link rel="stylesheet" href=".\css\sign_up.css">
</head>

<body>
  <h1 class="heading"><a href="login.php">Music Recommendation</a></h1>
  <div class="container">
    <p class="signup">Sign up</p>
    <form action="" method="post">
      <label for="user_id"></label>
      <input type="text" name="user_id" id="user_id" placeholder="ID" autocomplete='off' required>
      <br>
      <label for="user_pw"></label>
      <input type="password" name="user_pw" id="user_pw" placeholder="Password" autocomplete='off' required>
      <br>
      <label for="user_name"></label>
      <input type="text" name="user_name" id="user_name" placeholder="Name" autocomplete='off' required>
      <br>
      <label for="user_nick"></label>
      <input type="text" name="user_nick" id="user_nick" placeholder="NickName" autocomplete='off' required>
      <br>
      <input type="submit" name="submit" value="Sign up" class="submit">
      <br>
      <button onclick="location.href='login.php'">Login Page</button>
    </form>
  </div>
  <?php
    if(isset($_POST['submit'])){
      $user_id = $_POST['user_id'];
      $user_pw = $_POST['user_pw'];
      $user_name = $_POST['user_name'];
      $user_nick = $_POST['user_nick'];

      $db = mysqli_connect('localhost','root','') or die('Unable to connect');
      
      mysqli_select_db($db,'user_info') or die(mysqli_error($db));

      $query = "INSERT INTO user(user_id, user_pw, user_name, user_nick) VALUES ('$user_id','$user_pw','$user_name','$user_nick')";
      if (mysqli_query($db, $query)) {
        echo '<script>alert("Sign up successful!");
        window.location.href="login.php";
        </script>';
      } 
      else {
        echo '<script>alert("Sign up failed: ' . mysqli_error($db). '");</script>';
      }
  }
  ?>
</body>

</html>