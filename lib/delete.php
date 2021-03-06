<?php
if (
  isset($_GET['action']) && $_GET['action'] == 'delete'
  && isset($_GET['fname'])
  && isset($_GET['path'])
) {
  $filePath = $_GET['path'] . '/' . $_GET['fname'];
  unlink("./{$filePath}");
  $url = substr($_SESSION['root_dir'], 0, -1) . "?dir={$_GET['path']}";
  header("Location: {$url}");
  $_SESSION['successMsg'] = "File '{$$_GET['fname']}' deleted";
}
