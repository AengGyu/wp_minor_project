<?php

$db = mysqli_connect('localhost','root','') or die('Unable to connect');

mysqli_select_db($db,'user_info') or die(mysqli_error($db));

$query = 'CREATE TABLE comment(
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  post_id INTEGER UNSIGNED NOT NULL,
  user_nick VARCHAR(255) NOT NULL,
  comment VARCHAR(255) NOT NULL,
  PRIMARY KEY(id)
)';

mysqli_query($db,$query) or die(mysqli_error($db));

echo 'new table created!';
?>