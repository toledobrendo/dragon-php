<?php require_once('view-comp/header.php'); ?>
<div class="card-header">
  Add Author Result
</div>
<div class="card-body">
  <?php
    $authorName = $_POST['authorName'];

    try{
      if (!$authorName) {
        throw new Exception('Author details incomplete. Please try again.');
      }

      @ $db = new mysqli('127.0.0.1:3306','student','cndpgmfNhbsXbild','php_lesson_db');

      $dbError = mysqli_connect_errno();
      if ($dbError) {
        throw new Exception('Error: Could not connect to database. Please try again later.');
      }

      // Query by query string concatenation
      // $query = 'insert into author (name) values (\''.$authorName.'\')';
      // $result = $db->query($query);
      //
      // if ($result) {
      //   echo $db->affected_rows." author inserted into the database.";
      // } else {
      //   throw new Exception('Error: The author was not added.');
      // }

      // $authorName = $db->real_escape_string($authorName);

      // Query by prepared statements
      $query = $query =
         'INSERT INTO author (name)
         SELECT * FROM (SELECT ? AS name) AS temp
         WHERE NOT EXISTS (SELECT name FROM author WHERE name=?)LIMIT 1';
      $stmt = $db->prepare($query);
      $stmt->bind_param("ss", $authorName, $authorName);
      $stmt->execute();

      $affectedRows = $stmt->affected_rows;
      if ($affectedRows > 0) {
        echo $affectedRows." Author successfully added into the database.";
      } else {
        throw new Exception('Author already exists.');
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
<?php require_once('view-comp/footer.php'); ?>
