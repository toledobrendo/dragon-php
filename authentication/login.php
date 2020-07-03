<?php 
	if ($_SERVER['HTTPS'] != 'on') {
		header('Location: https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
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
	<div class="container">
		<div class="card">
			<div class="card-body">
				<form class="form-signin" method="post" action="login-proccess.php">
					<h4>Login</h4>
					<?php
						$username = isset($_COOKIE['username']) ? $_COOKIE['username'] : null;
						$password = isset($_COOKIE['password']) ? $_COOKIE['password'] : null;
						$rememberMe = isset($_COOKIE['rememberMe']) ? $_COOKIE['rememberMe'] : null;
					?>
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" name="username" id="username" value="<?=$username?>" class="form-control" placeholder="Username" required autofocus>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" id="password" value="<?=$password?>" class="form-control" placeholder="Password" required>
					</div>
					<?php 
						if (isset($_GET['error'])) {
							echo "<div class=\"alert alert-danger\">".$_GET['error']."</div>";
						}
					?>
					<div class="form-check">
						<input type="checkbox" class="form-check-input" name="rememberMe" <?=isset($rememberMe) ? 'checked' : ''?>>
						<label class="form-check-label">Remember Me</label>
					</div>
					<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
				</form>
				<div>
					<span>No account yet? Click <a href="register.php" class="btn-link">here</a> to register</span>
				</div>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>