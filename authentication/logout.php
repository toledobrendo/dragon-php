<?php 
	session_start();

	session_destroy(); // or
	//session_unset($_SESSION['username']);

	header('Location: login.php');
?>