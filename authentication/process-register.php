<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container">
			<div class="card">
				<div class="card-header">
					<h6>Register</h6>
				</div>
				<div class="card-body">
					<?php 
						$username = $_POST['username'];
						$password = $_POST['password'];

						try {
							if(!$username || !$password) {
								throw new Exception('Input is not complete');
							}

							@ $db = new mysqli('127.0.0.1:3306', 'user', '123qwe', 'php_lesson_db');

							

							$dbError = mysqli_connect_errno();
				 			if ($dbError) {
				 				throw new Exception('Could not connect to database. Try again. Error '.$dbError, 1);
				 			}

				 			$query = "INSERT INTO user_info (username, password, isActive) VALUES (?,?,?)";
				 			$stmt = $db->prepare($query);
				 			
				 			$hashPassword = hash('sha512', $password);
				 			$isActive = true;
				 			$stmt->bind_param("ssi", $username, $hashPassword, $isActive);
				 			$stmt->execute();

				 			echo "You've successfully registered a new account";
				 			
				 			$stmt->close();
						} catch(Exception $e) {
							echo $e->getMessage();
						};
					 ?>	
				</div>
				<div class="card-footer">
					<a href="login.php" class="btn btn-secondary">Back to Login</a>
				</div>
			</div>
		</div>

	    <!-- Optional JavaScript -->
	    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>