<?php
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
  print("\n reset all \n");
  // session_start();
  print($_GET['action']);
  unset($_SESSION['logged_in']);
  unset($_SESSION['time']);
  unset($_SESSION['username']);
  header("Location: ./");
}
