<?php
session_start();
$_SESSION['errMsg'] = '';
require('./lib/renderTable.php');
require('./lib/navigate.php');
require('./lib/auth.php');
require('./lib/create.php');

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
  <header>File Explorer
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
    <p class="err"><?php echo $_SESSION['errMsg'] ?></p>
    <div class="tabs">
      <button class="tab">Create Directory</button>
      <button class="tab active">Create File</button>
      <button class="tab">Upload file</button>
    </div>
    <form style='display:none' action='' method="POST" class="form">
      <h4 class='title'>Create New Directory</h4>
      <label for='dir-name'>Directory Name</label>
      <input type='text' id='dir-name' name='dir-name' />
      <div class="form-control">
        <button type="submit" name="createDirectory" class="btn">Create</button>
        <button class="btn danger">Cancel</button>
      </div>
    </form>
    <form action='' method="POST" class="form">
      <h4 class='title'>Create New File</h4>
      <label for='file-name'>File Name</label>
      <input type='text' id='file-name' name='file-name' />
      <div class="form-control">
        <button type="submit" name="createFile" class="btn">Create</button>
        <button class="btn danger">Cancel</button>
      </div>
    </form>
  </main>
</body>

</html>