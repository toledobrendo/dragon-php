<?php
  session_start();

  session_destroy();
  //OR
  //unset($_SESSION['username']);

  header('Location: login.php');
?>
