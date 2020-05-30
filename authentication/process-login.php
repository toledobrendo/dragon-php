<?php
  require_once('res/db-properties.php');
  $username = $_POST['username'];
  $password = $_POST['password'];

  try {
    if(!$username || !$password){
      throw new Exception('Invalid Input');
    } else {
      @ $db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
      $dbError = mysqli_connect_errno();

      if ($dbError) {
        throw new Exception('Connection Error');
      } else {
        $selectUser = 'SELECT FROM user_info WHERE username = ? and password = ?';
        $stmt = $db->prepare($selectUser);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if($Result->fetch_assoc()){
          header('Location: index.php');
        } else {
          throw new Exception("Invalid Credentials");
        }
      }

    }
  } catch (Exception $e) {
    echo $e->getMessage();
  }

?>
