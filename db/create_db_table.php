<?php

$db = mysqli_connect('localhost','root','') or die('Unable to connect');

$query = 'CREATE DATABASE IF NOT EXISTS user_info';
mysqli_query($db,$query) or die(mysqli_error($db));

mysqli_select_db($db,'user_info') or die(mysqli_error($db));

$query = 'CREATE TABLE user(
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  user_id VARCHAR(255) NOT NULL,
  user_pw VARCHAR(255) NOT NULL,
  user_name VARCHAR(255) NOT NULL,
  user_nick VARCHAR(255) NOT NULL,
  PRIMARY KEY(id)
)';

mysqli_query($db,$query) or die(mysqli_error($db));

echo 'database created!';
?>