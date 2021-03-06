<?php
if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
  $isValidUser = validUser($_POST['username'], $_POST['password']);
  $msg = '';
  if ($isValidUser) {
    $msg = 'Login successful! Redirecting...';
    $_SESSION['logged_in'] = true;
    $_SESSION['timeout'] = time();
    $_SESSION['username'] = $_POST['username'];
    header("Location: {$_SESSION['root_dir']}");
  } else {
    $msg = 'Invalid username or password!';
  }
}

function validUser($username, $password)
{
  return $username == 'admin' && $password == 'admin';
}
