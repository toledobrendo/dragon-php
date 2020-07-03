<?php
	require_once 'reference/properties.php';
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	try {
		@$db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
		$dbError = mysqli_connect_error();
		if ($dbError){
			echo "Error: Could not connect to database. Please try again later. ".$dbError;
		} else {
			$rememberMe = $_POST['rememberMe'];
			if (isset($rememberMe)) {
				$rememberMe = $_POST['rememberMe'];
				setcookie('username', $username, time() + 3600);
				setcookie('password', $password, time() + 3600);
				setcookie('rememberMe', $rememberMe, time() + 3600);
			} else {
				setcookie('username', $username, time() - 3600);
				setcookie('password', $password, time() - 3600);
				setcookie('rememberMe', $rememberMe, time() - 3600);
			}
			$query = "
				SELECT * FROM user_details
				WHERE username=? AND password=?;
			";
			$stmt = $db->prepare($query);
			$stmt->bind_param('ss', $username, hash('sha512', $password));
			$stmt->execute();
			$result = $stmt->get_result();
			if ($result->fetch_assoc()) {
				$_SESSION['username'] = $username;
				header('Location: index.php');
			} else {
				throw new Exception("Incorrect Credentials", 0);
			}
		}
	} catch (Exception $e) {
		header('Location: login.php?error='.$e->getMessage());
	}
	
?>