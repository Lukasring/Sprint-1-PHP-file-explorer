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
    print("<a href=\"?dir={$_SESSION['path']}/${name}\">{$name}</a><div></div></li>");
  } else {
    print("<div>{$name}</div><div><button>Delete</button></div></li>");
  }
}
