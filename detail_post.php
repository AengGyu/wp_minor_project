<?php
  session_start();
  $user_nick = $_SESSION['user_nick'];
  
  if(isset($_GET['id'])){
    $id = $_GET['id'];

    $db = mysqli_connect('localhost','root','') or die('Unable to connect');

    mysqli_select_db($db,'user_info') or die(mysqli_error($db));

    $query = "SELECT id, user_nick, title, singer, category, content FROM post WHERE id = '$id'";
    $result = mysqli_query($db,$query) or die(mysqli_error($db));

    if($result->num_rows > 0){
      $row = mysqli_fetch_array($result);
    }
    else{
      echo 'Post not exist.';
      exit; 
    }
  }
  else{
    echo 'Invalid approach';
    exit;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $row['title']?> - <?php echo $row['singer']?></title>
  <link rel="stylesheet" href=".\css\detail_post.css">
</head>
<body>
  <h1 class="heading"><a href="main.php">Music Recommendation</a></h1>
  <div class="container">
    <div class="header">
      <h1><?php echo $row['title'];?> - <?php echo $row['singer'];?></h1>
      <p>Writer : <?php echo $row['user_nick'];?></p>
      <p>Category : <?php echo $row['category'];?></p>
    </div>
    <div class="content">
      <p class="ex">Content</p>
      <p><?php echo $row['content'];?></p>
    </div>
    <button onclick="history.back()">Back</button>
    <div class="post_comment">
      <p>Comments</p>
      <form action="" method="post">
        <label for="comment"></label>
        <textarea name="comment" id="comment" placeholder="Write comment." cols="50" rows="4" required></textarea><br>
        <input type="submit" name="submit" value="Post">
      </form>
    </div>
    <?php
      if(isset($_POST['submit'])){
        $comment = $_POST['comment'];
        
        $query = "INSERT INTO comment(post_id, user_nick, comment) VALUES('$id', '$user_nick', '$comment')";
        
        if(mysqli_query($db,$query)){
          echo '<script>alert("Post successful!");
          window.location.reload();";
          </script>';
        }
        else{
          echo '<script>alert("failed: ' . mysqli_error($db). '");</script>';
        }
      }
    ?>
    <div>
      <?php
        $query = "SELECT user_nick, comment
        FROM comment
        WHERE post_id = '$id'";

        $result = mysqli_query($db,$query) or die(mysqli_error($db));

        if($result->num_rows > 0){
          while($row = mysqli_fetch_array($result)){
            echo "<div class='comment_box'>
            <p>".$row['user_nick']."</p>
            <p>".$row['comment']."</p>
            </div>";
          }
        }
        else{
          echo '<p>No comment yet.</p>';
        }
      ?>
    </div>
  </div>
</body>
</html>