<?php

if (isset($_GET["dir"]) && !empty($_GET['dir'])) {
  $_SESSION['path'] = $_GET['dir'];
} else {
  $_SESSION['path'] = '';
  $_SESSION['root_dir'] = $_SERVER['REQUEST_URI'];
}
