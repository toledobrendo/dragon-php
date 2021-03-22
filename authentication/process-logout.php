<?php
	session_start();

	session_destroy(); //destroys all within the session
	//unset($_SESSION['username']); //unsets only the specified data
	header('Location: login.php');
?>