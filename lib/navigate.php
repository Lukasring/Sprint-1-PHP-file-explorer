<?php

if (isset($_GET["dir"]) && !empty($_GET['dir'])) {
  $_SESSION['path'] = $_GET['dir'];
} else {
  $_SESSION['path'] = '';
  $root = $_SERVER['REQUEST_URI'];
  // removes query parameter if exists
  $root = preg_replace('/\?.*/', '', $root);
  $_SESSION['root_dir'] = $root;
}
