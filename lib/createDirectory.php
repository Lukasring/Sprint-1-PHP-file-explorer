<?php
if (isset($_POST['createDirectory']) && !empty($_POST['dir-name'])) {
  $dirPath = $_SESSION['path'] . '/' . $_POST['dir-name'];
  if (!file_exists("./{$dirPath}")) {
    mkdir("./{$dirPath}");
    $_SESSION['errMsg'] = '';
  } else {
    $_SESSION['errMsg'] = "Directory '{$_POST['dir-name']}' already exists!";
  }
}
