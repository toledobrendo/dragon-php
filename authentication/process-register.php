<html>

<head>
	<title> Register </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

	<div class="container">
		<div class ="card">
			<div class="card-header">
				<h3>Register</h3>
			</div>
			<div class="card-body">
				<?php
					$username = $_POST['username'];
					$password = $_POST['password'];

					try {

						if(!$username || !$password) {
							throw new Exception('Input is not complete');
						}

						@ $db = new mysqli('127.0.0.1:3306', 'student', 'mydev040100', 'php_lesson_db');

		    			$dbError = mysqli_connect_errno();

		   				if ($dbError) {
		    				throw new Exception('Error: Could not connect to database. Please try again later.');
		    			}

		    			$query = "INSERT INTO user_info (username, password) VALUES (?,?)";
		    			$stmt = $db->prepare($query);
		    			$stmt->bind_param("ss", $username, $password);
		    			$stmt->execute();

		    			echo "You have successfully registered a new account.";

		    			$stmt->close();

					} catch(Exception $e) {
						echo $e->getMessage();
					}
				?>
			</div>

			<div class="card-footer">
				<a href="login.php" class="btn btn-secondary">Go Back</a>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>