<?php
	//include: reusing scripts, enables separation of functions, classes and behavior
	//include 'message.php'; 

	//require: results to fatal error when filename was not found
	//require('message.php'); 

	//require once: ensures that the script only runs once
	//this checks first if the filename is already imported
	//if yes-  importation will not push through
	require_once('message.php'); 
	
	require_once('view-comp/header.php');
?>

<?php 
	echo $message;
?>

<?php
	require_once('view-comp/footer.php');
?>