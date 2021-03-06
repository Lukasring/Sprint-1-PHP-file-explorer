<?php
if (isset($_POST['createDirectory']) && !empty($_POST['dir-name'])) {
  $dirPath = $_SESSION['path'] . '/' . $_POST['dir-name'];
  if (!file_exists("./{$dirPath}")) {
    mkdir("./{$dirPath}");
    $_SESSION['errMsg'] = '';
    $_SESSION['successMsg'] = "Directory '{$_POST['dir-name']}' created!";
  } else {
    $_SESSION['errMsg'] = "Directory '{$_POST['dir-name']}' already exists!";
    $_SESSION['successMsg'] = '';
  }
}

if (isset($_POST['createFile']) && !empty($_POST['file-name'])) {
  $filePath = $_SESSION['path'] . '/' . $_POST['file-name'];
  if (!file_exists("./{$filePath}")) {
    file_put_contents("./{$filePath}", '');
    $_SESSION['errMsg'] = '';
    $_SESSION['successMsg'] = "File '{$_POST['file-name']}' created!";
  } else {
    $_SESSION['errMsg'] = "File '{$_POST['file-name']}' already exists!";
    $_SESSION['successMsg'] = '';
  }
}
