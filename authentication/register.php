<?php
	require_once('view-comp/header.php');
?>

<div class="card-header">
	<h6>Register</h6>
</div>
<div class="card-body">
	<form action="process-register.php" method="POST" autocomplete="off">
		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus>
		</div>

		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
		</div>
		
		<div class="form-group">
			<a href="login.php" class="btn btn-secondary">Go Back</a>
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</form>

<?php
	require_once('view-comp/footer.php');
?>
