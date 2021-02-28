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
        print("<li><div>{$type}</div><div>{$name}</div></li>");
      }

      // $path = '.';
      $dir = glob(dirname(__FILE__));
      // $path = $dir[0] . '/rand'; // neveikia
      $path = $dir[0];
      // print($dir[0]);
      // $resourece = opendir($path);
      // var_dump($resourece);
      printDirectoriesAndFiles($path);


      ?>
    </ul>
    <button class="btn back">Back</button>
  </main>
</body>

</html>