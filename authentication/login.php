<?php
	if($_SERVER['HTTPS'] != 'on') {
		header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
		exit;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<div class="container" style="max-width: 400px;">
		<div class="card" >
			<div class="card-body">
				<h3 class="card-title">Login</h3>

				<form action="process-login.php" method="post">
					<?php
						if(isset($_GET['error'])) {
							echo '<div class="alert alert-danger">' . $_GET['error'] . '</div>';
						}
					?>

					<div class="form-group">
						<label for="username">Username</label>
						<input class="form-control" type="text" id="username" name="username" placeholder="" required>
					</div>

					<div class="form-group">
						<label for="password">Password</label>
						<input class="form-control" type="password" id="password" name="password" placeholder="" required>
					</div>


					<div class="form-group">
						<button class="btn btn-primary" type="submit">Sign in</button><br>
					</div>

					<div class="">
						<span>No account yet? </span><a href="register.php" style="text-decoration: underline;">Register here</a>
					</div>
				</form>

			</div>
		</div>
	</div>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquesry-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>