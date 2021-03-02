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
  <header>File explorer</header>
  <main>
    <ul>
      <li class="column-titles">
        <div>Type</div>
        <div>Name</div>
        <div>Actions</div>
      </li>
      <?php
      function printDirectoriesAndFiles($path)
      {
        $scannedDirectory = array_diff(scandir($path), array('..', '.'));
        // print_r($scannedDirectory);
        foreach ($scannedDirectory as $value) {
          // print($value);
          if (is_dir($path . DIRECTORY_SEPARATOR . $value)) {
            printLine('Directory', $value);
          } elseif (is_file($path . DIRECTORY_SEPARATOR . $value)) {
            printLine('File', $value);
          }
        }
      }

      function printLine($type, $name)
      {
        print("<li><div>{$type}</div>");
        if ($type == 'Directory') {
          print("<a href=\"?dir=${name}\">{$name}</a><div></div></li>");
        } else {
          print("<div>{$name}</div><div><button>Delete</button></div></li>");
        }
      }
      $dir = glob(dirname(__FILE__));
      $basePath = $dir[0];
      // $currentPath;
      $currentPath = $basePath;
      // $path = '.';
      if (isset($_GET["dir"])) {
        $currentPath = $currentPath . DIRECTORY_SEPARATOR . $_GET["dir"];
      } else {
        $currentPath = $basePath;
      }
      // $path = $dir[0] . '/rand'; // neveikia
      // $resourece = opendir($path);
      // var_dump($resourece);
      printDirectoriesAndFiles($currentPath);
      print("\n {$currentPath}");

      ?>
    </ul>
    <button class="btn back">Back</button>
    <?php
    // print('<br>');
    // var_dump($_SERVER['REQUEST_URI']);
    // print('<br>');
    // var_dump($_SERVER['REQUEST_METHOD']);
    // print('<br>');
    // var_dump($_SERVER['SCRIPT_NAME']);

    ?>
  </main>
</body>

</html>