<?php
if (
  isset($_GET['action']) && $_GET['action'] == 'delete'
  && isset($_GET['fname'])
) {
  $filePath = $_GET['path'] . '/' . $_GET['fname'];
  unlink("./{$filePath}");
  $url = substr($_SESSION['root_dir'], 0, -1) . "?dir={$_GET['path']}";
  header("Location: {$url}");
}
