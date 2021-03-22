<?php
	session_start();

	require_once('resources/db-properties.php');

	$username = $_POST['username'];
	$password = $_POST['password'];

	try {
		if(!$username || !$password) {
			throw new Exception('Incomplete credentials!');
		}

		@ $db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
		$dbError = mysqli_connect_errno();

		if($dbError) {
			throw new Exception('Error: Could not connect to database. Please try again later');
		}

		$queryString = 'SELECT * FROM user_info WHERE username = ? AND password = ?';
		$stmt = $db->prepare($queryString);

		$hashedPassword = hash('sha512', $password);
		$stmt->bind_param('ss', $username, $hashedPassword);
		$stmt->execute();
		$result = $stmt->get_result();

		if($result->fetch_assoc()) { //checks if there is data
			$_SESSION['username'] = $username;
			header('Location: index.php'); //Location: should be there, followed by the file or path
		} else {
			throw new Exception('Incorrect credentials.');
		}

		$stmt->close();

	} catch(Exception $e) {
		header('Location: login.php?error='. $e->getMessage());
	}
?>