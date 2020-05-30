<?php 
	session_start();

	// destroy the session itself
	session_destroy();

	// destroy only the credentials of the session
	// unset($_SESSION['username']);

	header('Location: login.php');
 ?>