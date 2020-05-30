<?php 
	session_start();
	require_once('resource/db-properties.php');
 ?>

<?php 
	$username = $_POST['username'];
	$password = $_POST['password'];

	try {
		if(!$username || !$password) {
			throw new Exception('No credentials');
		}

		@ $db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

		$dbError = mysqli_connect_errno();
		if ($dbError) {
			throw new Exception('Could not connect to database. Try again. Error '.$dbError, 1);
		}

		// search if the login credentials exist in db
		$query = 'SELECT * FROM user_info WHERE username = ? AND password = ?';
		$stmt = $db->prepare($query);
		$stmt->bind_param("ss", $username, $password);
		$stmt->execute();

		$result = $stmt->get_result();

		if($result->fetch_assoc()) {
			// store the username in the session
			$_SESSION['username'] = $username;
			header('Location: index.php');
		} else {
			throw new Exception('Incorrect Credentials');
		}

	} catch(Exception $e) {
		header('Location: login.php?error='.$e->getMessage());
		// echo $e->getMessage();
	}
 ?>