<?php require_once('view-comp/header.php');?>
<div class="card-header">
  Book Results
</div>
<div class="card-body">
  <?php
    $searchType = $_POST['searchType'];
    $searchTerm = $_POST['searchTerm'];

    try {
      if (!$searchType || !$searchTerm) {
        throw new Exception('You have not entered search details. Please go back and try again.', 1);
      }

      // 127.0.0.1 = localhost
      @ $db = new mysqli('127.0.0.1:3306', 'student', '123qwe', 'php_lesson_db');

      $dbError = mysqli_connect_errno();
      if ($dbError) {
        throw new Exception('Error: Could not connect to database. Please try again later. '.$dbError, 1);
      }

    } catch (Exception $e) {
      echo $e->getMessage();
      echo '<br/>';
      echo '<a class="btn btn-secondary my-3" href="index.php">Go Back</a>';
    }
  ?>
</div>
<?php require_once('view-comp/footer.php');?>
