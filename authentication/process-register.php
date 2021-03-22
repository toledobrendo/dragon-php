<?php
	require_once('view-comp/header.php');
	require_once('resources/db-properties.php');
?>

<div class="card-head">
	<h6>Register</h6>
</div>
<div class="card-body">
	<?php
		$username = $_POST['username'];
		$password = $_POST['password'];

		try {
			if(!$username || !$password) {
				throw new Exception('Input is incomplete!');
			}

			@ $db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
			$dbError = mysqli_connect_errno();

			if($dbError) {
				throw new Exception('Error: Could not connect to database. Please try again later');
			}

			$queryString = 'INSERT INTO user_info (username, password) VALUES (?, ?)';
			$stmt = $db->prepare($queryString);

			$hashedPassword = hash('sha512', $password);//sha512 is a hashing algorithm
			$stmt->bind_param('ss', $username, $hashedPassword); 
			$stmt->execute();
			echo 'You have successfully registered a new account!';

			$stmt->close();

		} catch(Exception $e) {
			echo $e->getMessage();
		}
	?>
	<div class="card-footer">
		<a href="login.php" class="btn btn-secondary">Go Back</a>
	</div>
<?php
	require_once('view-comp/footer.php');
?>