<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Music Based On Singer</title>
  <link rel="stylesheet" href=".\css\singer.css">
</head>
<body>
  <h1 class="heading"><a href="main.php">Music Recommendation</a></h1>
  <div class="container">
    <p class="search">Search based on singer</p>
    <form action="" method="post">
      <label for="singer"></label>
      <input type="text" name="singer" id="singer" placeholder="Singer" autocomplete="off" required>
      <input type="submit" name="search" value="Search">
    </form>
    <button onclick="location.href='main.php'">Home</button>
    <div class="result">
      <?php
      if(isset($_POST['search'])){
        $singer = $_POST['singer'];
      
        $db = mysqli_connect('localhost','root','') or die('Unable to connect.');

        mysqli_select_db($db,'user_info') or die(mysqli_error($db));

        $query = "SELECT id, user_nick, title, singer, category FROM post WHERE singer = '$singer'";

        $result = mysqli_query($db,$query) or die(mysqli_error($db));

        if($result->num_rows > 0){
          echo "<table border='1' style='border-collapse:collapse;'>";
          echo "<tr><th>Index</th><th>Title</th><th>Singer</th><th>Category</th><th>Writer</th></tr>";
          while($row = mysqli_fetch_array($result)){
            echo "<tr>
            <td>" . $row["id"] . "</td>
            <td><a href='detail_post.php?id=" . $row["id"] . "'>". $row["title"] . "</a></td>
            <td>" . $row["singer"] . "</td>
            <td>" . $row["category"] . "</td>
            <td>" . $row["user_nick"] . "</td></tr>";
          }
        }
        else{
          echo '<p>No Search Result<p>';
        }
      }
      ?>
    </div>
  </div>
</body>
</html>