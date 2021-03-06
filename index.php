<?php
session_start();
require('./lib/renderTable.php');
require('./lib/navigate.php');
require('./lib/auth.php');

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
  <link rel="stylesheet" href="./src/styles/styles.css">
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

  </main>
</body>

</html>