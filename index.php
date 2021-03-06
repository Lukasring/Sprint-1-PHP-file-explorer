<?php
session_start();
$_SESSION['errMsg'] = '';
$_SESSION['successMsg'] = '';
require('./lib/renderTable.php');
require('./lib/navigate.php');
require('./lib/auth.php');
require('./lib/create.php');
require('./lib/delete.php');
require('./lib/uploadFile.php');
require('./lib/download.php');

if (!isset($_SESSION['logged_in'])) {
  var_dump($_SESSION['logged_in']);
  print('not logged in');
  header("Location: {$_SESSION['root_dir']}login");
}

$dir = glob(dirname(__FILE__));
$basePath = $dir[0];

require('./lib/logout.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./src/styles/main.css">
  <title>File Explorer</title>
</head>

<body>
  <header>
    <a href='./' class="header-title">File Explorer</a>
    <a href="?action=logout" class="btn logout">Logout</a>
  </header>
  <main>
    <div class="current-location">
      Current Location:
      <?php
      print(substr($_SESSION['root_dir'], 0, -1) . $_SESSION['path']);
      ?>
    </div>
    <ul>
      <li class="column-titles">
        <div>Type</div>
        <div>Name</div>
        <div>Actions</div>
      </li>
      <?php
      printDirectoriesAndFiles($basePath . $_SESSION['path']);
      ?>
    </ul>
    <?php

    $previousPath = preg_replace('([^\/]+$)', '', $_SESSION['path']);
    // nepavyko su regex 
    $previousPath = substr($previousPath, 0, -1);

    (($previousPath == '') || ($previousPath == '/')) ?
      print("<a href='{$_SESSION['root_dir']}' class=\"btn back\">Back</a>") :
      print("<a href='?dir={$previousPath}' class=\"btn back\">Back</a>");
    ?>
    <p class="msg err"><?php echo $_SESSION['errMsg'] ?></p>
    <p class="msg success"><?php echo $_SESSION['successMsg'] ?></p>
    <div class="tabs">
      <button id='create-dir-tab' class="tab">Create Directory</button>
      <button id='create-file-tab' class="tab">Create File</button>
      <button id='upload-file-tab' class="tab">Upload file</button>
    </div>
    <form id='create-dir-form' action='' method="POST" class="form hidden">
      <h4 class='title'>Create New Directory</h4>
      <label for='dir-name'>Directory Name</label>
      <input type='text' id='dir-name' name='dir-name' />
      <div class="form-control">
        <button type="submit" name="createDirectory" class="btn">Create</button>
        <button class="btn danger">Cancel</button>
      </div>
    </form>
    <form id='create-file-form' action='' method="POST" class="form hidden">
      <h4 class='title'>Create New File</h4>
      <label for='file-name'>File Name</label>
      <input type='text' id='file-name' name='file-name' />
      <div class="form-control">
        <button type="submit" name="createFile" class="btn">Create</button>
        <button class="btn danger">Cancel</button>
      </div>
    </form>
    <form id='upload-file-form' action="" method="POST" enctype="multipart/form-data" class="form hidden">
      <label for='file-input' class='file-upload__label'>
        Click here to select file
        <input id='file-input' type="file" name="file" style="display:none" />
      </label>
      <p class='file-upload__file-info'>No file selected</p>
      <div class="form-control">
        <button type="submit" class="btn">Submit</button>
        <button class="btn danger">Cancel</button>
      </div>
    </form>


  </main>
</body>
<script src="./src/app/app.js" type='module'></script>

</html>