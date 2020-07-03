<?php
	session_start();
	if ($_SESSION['username'] == null) {
		header('Location: login.php');
	}
	if (@ $_SERVER['HTTPS'] == 'on') {
		header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="navbar navbar-expand navbar-dark bg-dark">
		<div href="index.php" class="navbar-brand">Authentication</div>
		<div class="navbar-collapse" id="navbarNav">
			<div class="navbar-nav mr-auto"></div>
			<ul class="navbar-nav my-2 my-lg-0">
				<li class="nav-item dropdown">
					<a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">
						<?=$_SESSION['username'];?>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a href="logout.php" class="dropdown-item">logout</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>