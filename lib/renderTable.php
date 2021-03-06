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
    $classes = 'btn small danger';
    $isPHP = preg_match('/\.(php)$/', $name);
    if ($isPHP == 1) {
      $classes = $classes . ' disabled';
    }
    print("<div>{$name}</div><div class='file-actions'>");
    print("<a href='?action=delete&fname={$name}&path={$_SESSION['path']}' class='{$classes}'>Delete</a>");
    print(renderFileActionPostForm('download', $_SESSION['path'], $name));
    print("</div></li>");
  }
}

function renderFileActionPostForm($action, $path, $filename)
{

  $formHTML = "<form method='POST'>
                <input type='submit' name='${action}' value='{$action}' class='btn small'/>
                <input type='hidden' name='file' value='{$filename}'/>
                <input type='hidden' name='path' value='{$path}'/>
              </form>";

  return $formHTML;
}
