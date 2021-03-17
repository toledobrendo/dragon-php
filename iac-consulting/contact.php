<?php
	//calls or imports the message.php file twice
	// include('message.php'); //continues even if the file does not exist
	// require('message.php'); //throws and error if file is not found
	
	//ensures that the file is only imported once
	require_once('script.php');
	require_once('message.php');
	require_once('view-comp/header.php');
?>

We are located at Yakal St., Makati City

<?php
	require_once('view-comp/footer.php')
?>
			