<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Post Recommendation</title>
  <link rel="stylesheet" href=".\css\post.css">
</head>
<body>
  <h1 class="heading"><a href="main.php">Music Recommendation</a></h1>
  <div class="container">
    <p class="post">Post</p>
    <form action="" method="post">
      <label for="title"></label>
      <input type="text" name="title" id="title" placeholder="Write title" autocomplete="off" required> <br>
      <label for="singer"></label>
      <input type="text" name='singer' id="singer" placeholder="Singer" autocomplete="off" required> <br>
      <label for="category"></label>
      <select name="category" id="category">
            <option value="" disabled selected>Select category</option>
            <option value="Kpop">K-POP</option>
            <option value="Jpop">J-POP</option>
            <option value="pop">POP</option>
            <option value="cpop">C-POP</option>
            <option value="others">OTHERS</option>
      </select><br>
      <label for="content"></label>
      <textarea name="content" id="content" cols="20" rows="5" placeholder="Write the reason why you recommend this music." autocomplete="off" required></textarea> <br>
      <input type="submit" name="submit" value="Post">
      <button onclick="location.href='main.php'">Cancel</button>
    </form>
    <!-- <p class="cancel">(If you want to cancel, click site name.)</p> -->
  </div>
  <?php
    session_start();
    $user_id = $_SESSION['user_id'];
    $user_nick = $_SESSION['user_nick'];
    if(isset($_POST['submit'])){
      $title = $_POST['title'];
      $singer = $_POST['singer'];
      $category = $_POST['category'];
      $content = $_POST['content'];

      $db = mysqli_connect('localhost','root','') or die('Unable to connect');

      mysqli_select_db($db,'user_info') or die(mysqli_error($db));

      $query = "INSERT INTO post(user_id, user_nick, title, singer, category, content) VALUES ('$user_id', '$user_nick', '$title', '$singer', '$category', '$content')";

      if(mysqli_query($db,$query)){
        echo '<script>alert("Post successful!");
        window.location.href="main.php";
        </script>';
      }
      else{
        echo '<script>alert("Sign up failed: ' . mysqli_error($db). '");</script>';
      }
    }
  ?>
</body>
</html>