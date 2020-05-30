<?php
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

    $query = 'select * from user_info where username = ? and password = ?';
    $stmt = $db->prepare($query);
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->fetch_assoc()) {
      header('Location: index.php');
    } else {
      throw new Exception('Incorrect credentials');
    }
  } catch(Exception $e) {
    echo $e->getMessage();
  }
?>
