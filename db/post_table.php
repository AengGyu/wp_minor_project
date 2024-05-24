<?php
  
$db = mysqli_connect('localhost','root','') or die('Unable to connect');

mysqli_select_db($db,'user_info') or die(mysqli_error($db));

$query = 'CREATE TABLE post(
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  user_id VARCHAR(255) NOT NULL,
  user_nick VARCHAR(255) NOT NULL,
  title VARCHAR(255) NOT NULL,
  singer VARCHAR(255) NOT NULL,
  category VARCHAR(255) NOT NULL,
  content VARCHAR(255) NOT NULL,
  PRIMARY KEY(id)
  )';
mysqli_query($db,$query) or die(mysqli_error($db));

echo 'new table created!';

?>