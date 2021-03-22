<?php
	session_start();
	if(!isset($_SESSION['username'])) { //checks if there is data in the session username
		header('Location: login.php?error=Unauthorized Access.');
	}

	if(@ $_SERVER['HTTPS'] == 'on') { //checks if server is HTTPS
		//redirects the site to http mode
		header('Location: http://'. $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		exit;
	}

	require_once('view-comp/header.php');
?>

<div class="card-body">
	Hello, <?php echo $_SESSION['username'];?> <a href="process-logout.php">Logout</a>?
</div>

<div class="card-footer">
	<a href="login.php" class="btn btn-secondary">Go Back</a>
</div>

<?php
	require_once('view-comp/footer.php');
?>