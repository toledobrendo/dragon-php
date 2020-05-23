<?php require_once('view/header.php'); ?>
<div class="card-header">
  Add Book Result
</div>
<div class="card-body">
  <?php
    //Retrieving of information
    $bookTitle = $_POST['bookTitle'];
    $authorName = $_POST['authorName'];
    $isbn = $_POST['bookISBN'];
    $picURL = $_POST['pic_url'];

    try{
      if (!$bookTitle || !$authorName || !$isbn || $picURL) {
        throw new Exception('Book details are not complete. Please try again.');
      }

      @ $db = new mysqli('127.0.0.1:3306', 'student', 'b00kcatal0g', 'php_lesson_db');

      $dbError = mysqli_connect_errno();
      if ($dbError) {
        throw new Exception('Error: Could not connect to database. Please try again later.');
      }

      //First check if author is legit
      $selectQuery = 'SELECT name as author_name
        FROM author';

      //If legit, then proceed with adding. Else, error.

      // $authorName = $db->real_escape_string($authorName);

      // Query by prepared statements
      $query = 'insert into author (name) values (?)';
      $stmt = $db->prepare($query);
      $stmt->bind_param("s", $authorName);
      $stmt->execute();

      $affectedRows = $stmt->affected_rows;
      if ($affectedRows > 0) {
        echo $affectedRows." author inserted into the database.";
      } else {
        throw new Exception('Error: The author was not added.');

      }

      $stmt->close();

    } catch (Exception $e) {
      echo $e->getMessage();
    }
  ?>
</div>
<div class="card-footer">
  <a class="btn btn-secondary" href="author-add.php">Back</a>
</div>
<?php require_once('view/footer.php'); ?>
