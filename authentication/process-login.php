<?php
  session_start();

  require_once('resources/db-properties.php');

  $username = $_POST['username'];
  $password = $_POST['password'];

  try {
    if (!$username || !$password) {
      throw new Exception('Incomplete credentials');
    }

    @ $db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    $dbError = mysqli_connect_errno();
    if ($dbError) {
      throw new Exception('Could not connect to the database.');
    }

    $isActive = true;

    $query = 'select * from user_info where username = ? and password = ? and active = ?';
    $stmt = $db->prepare($query);


    $hashedPassword = hash('sha512', $password);
    $stmt->bind_param('ssi', $username, $hashedPassword, $isActive);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->fetch_assoc()) {
      $_SESSION['username'] = $username;
      header('Location: index.php');
    } else {
      throw new Exception('Incorrect credentials');
    }
  } catch(Exception $e) {
    header('Location: login.php?error='.$e->getMessage());
  }
?>
