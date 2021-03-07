<?php
define('MB', 1048576);
if (isset($_FILES['file']) && !empty($_FILES['file']['name'])) {
  $err = false;
  $errors = array();
  $file_name = $_FILES['file']['name'];
  $file_size = $_FILES['file']['size'];
  $file_tmp = $_FILES['file']['tmp_name'];
  $file_type = $_FILES['file']['type'];

  if ($file_size > 5 * MB) {
    $_SESSION['errMsg'] = 'File size must be smaller than 2 MB';
    $err = true;
  }
  if (!$err) {
    move_uploaded_file($file_tmp, ".{$_SESSION['path']}/" . $file_name);
    $_SESSION['successMsg'] = "File {$file_name} uploaded successfuly!";
  }
} elseif (isset($_FILES['file']) && empty($_FILES['file']['name'])) {
  $_SESSION['errMsg'] = 'Please select file!';
}
