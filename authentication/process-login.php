<?php
	session_start();
	require_once('resources/db-properties.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>


	<div class="container">
		<div class="card" >
			<div class="card-body">
				<h3 class="card-title">Login - Results</h3>

				<?php
					$username = $_POST['username'];
					$password = $_POST['password'];

					try {
						if(!$username || !$password) {
							throw new Exception('Registration data not complete. Please try again.');
						}

						$db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

						$dbError = mysqli_connect_errno();
						if($dbError) {
							throw new Exception('Cannot connect to database. Try again later.');
						}

						$query = 
						'
						SELECT * FROM user_info
							WHERE username = ? AND password = ?;
						';

						$stmt = $db->prepare($query);
						$hashedPassword = hash('sha512', $password);
						$stmt->bind_param("ss", $username, $hashedPassword);
						$stmt->execute();
						$result = $stmt->get_result();

						if($result->fetch_assoc()) {
							$_SESSION['username'] = $username;
							header('Location: index.php');
						} else {
							throw new Exception('Invalid credentials.');
							
						}

					} catch(Exception $e) {
						header('Location: login.php?error=' . $e->getMessage());
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