<?php
	if($_SERVER['HTTPS'] != 'on') { //checks if server is HTTPS
		//redirects the site to https mode
		header('Location: https://'. $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		exit;
	}
	require_once('view-comp/header.php');
?>

<link rel="stylesheet" type="text/css" href="css/login-css.css">
<div class="card-body">
	<form action="process-login.php" method="POST" class="form-signin" autocomplete="off">
		<h4>Please sign in</h4>
		<input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus>
		<input type="password" name="password" id="password" placeholder="Password" class="form-control" required>

		<?php if(isset($_GET['error'])){//checks if there is data in the 'error' of the URL?>
			<div class="alert alert-danger">
				<?php echo $_GET['error'];?>				
			</div>
		<?php } ?>

		<div class="row">
			<a href="register.php" class="btn btn-lg btn-success col-6">Register</a>
			<button type="submit" class="btn btn-lg btn-primary col-6">Log In</button>
		</div>
	</form>

<?php
	require_once('view-comp/footer.php');
?>