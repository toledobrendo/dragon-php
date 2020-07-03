<?php 
	require_once 'reference/properties.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	try {
		@$db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
		$dbError = mysqli_connect_error();
		if ($dbError){
			echo "Error: Could not connect to database. Please try again later. ".$dbError;
		} else {
			$query = "
				SELECT * FROM user_details
				WHERE username=?;
			";
			$stmt = $db->prepare($query);
			$stmt->bind_param('ss', $username);
			$stmt->execute();
			$result = $stmt->get_result();
			$resultCount = $result->num_rows;
			if ($resultCount >= 1) {
				throw new Exception("User is Already Registered", 0);
			} elseif ($resultCount == 0) {
				$query = "
					INSERT INTO user_details (username, password) VALUES (?,?);
				";
				$stmt = $db->prepare($query);
				$stmt->bind_param('ss', $username, hash('sha512', $password));
				$stmt->execute();
				$stmt->close();
				header('Location: login.php');
			}
		}
	} catch (Exception $e) {
		echo "wow";
		header('Location: register.php?error='.$e->getMessage());
	}
?>