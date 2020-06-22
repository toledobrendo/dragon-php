<!DOCTYPE html>
<html>
<head>
	<title>Register - Results</title>
</head>
<body>

	<div class="container">
		<div class="card" >
			<div class="card-body">
				<h3 class="card-title">Register - Results</h3>

				<?php
					$username = $_POST['username'];
					$password = $_POST['password'];

					try {
						if(!$username || !$password) {
							throw new Exception('Registration data not complete. Please try again.');
						}

						$db = new mysqli('127.0.0.1:3306', 'root', '', 'php_lesson_db');

						$dbError = mysqli_connect_errno();
						if($dbError) {
							throw new Exception('Cannot connect to database. Try again later.');
						}

						$query = 
						'
						INSERT INTO user_info(username, password)
							VALUES (?, ?);
						';

						$stmt = $db->prepare($query);
						$hashedPassword = hash('sha512', $password);
						$stmt->bind_param("ss", $username, $hashedPassword);
						$stmt->execute();


						$affected_rows = $stmt->affected_rows;
						if($affected_rows > 0) {
							//echo $affected_rows . ' user successfully added.';
							echo 'Successfully created an account. ' . '<a href="login.php" style="text-decoration: underline;">Click here to login</a>';
						} else {
							throw new Exception('Could not add user.');
						}

					} catch(Exception $e) {
						echo $e->getMessage();
					}
				?>

			</div>
		</div>
	</div>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquesry-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>