<?php
session_start();
require('../lib/auth.php');
if ($_SESSION['logged_in']) {
  header("Location: {$_SESSION['root_dir']}");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../src/styles/styles.css">
  <link rel="stylesheet" href="../src/styles/login.css">
  <title>Log In</title>
</head>


<body>
  <header>File Explorer</header>
  <main>

    <form class='login-form' action='./index.php' method="POST">'
      <h3>Log In</h3>
      <label for='username'>Username</label>
      <input id='username' name='username' type='text' placeholder="admin">
      <label for='password'>Password</label>
      <input id='password' name='password' type="password" placeholder="admin">
      <button type="submit" class="btn login" name='login'>Log In</button>
    </form>
    <?php
    print($msg);
    ?>
  </main>
</body>

</html>