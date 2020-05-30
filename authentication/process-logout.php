<?php
  session_start();

  session_destroy(); // or
  // unset($_SESSION['username']);

  header('Location: login.php');
?>
