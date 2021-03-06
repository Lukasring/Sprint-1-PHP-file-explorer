<?php
define('MB', 1048576);
$err = false;
if (isset($_FILES['image'])) {
  $errors = array();
  $file_name = $_FILES['image']['name'];
  $file_size = $_FILES['image']['size'];
  $file_tmp = $_FILES['image']['tmp_name'];
  $file_type = $_FILES['image']['type'];
  // check extension (and only permit jpegs, jpgs and pngs)
  // $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
  // $extensions = array("jpeg", "jpg", "png");
  // if (in_array($file_ext, $extensions) === false) {
  //   $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
  // }
  if ($file_size > 5 * MB) {
    $_SESSION['errMsg'] = 'File size must be smaller than 2 MB';
    $err = true;
  }
  if (!$err) {
    move_uploaded_file($file_tmp, ".{$_SESSION['path']}/" . $file_name);
    $_SESSION['successMsg'] = "File {$file_name} uploaded successfuly!";
  }
}
