<?php require_once('view-comp/header.php'); ?>

<div class="card-header">
  Add Book Result
</div>
<div class="card-body">
    <?php
        $bookTitle = $_POST['bookTitle'];
        $authorName = $_POST['authorName'];
        $isbn = $_POST['isbn'];
        $imageUrl = $_POST['imageUrl'];

        try {

          @ $db = new mysqli('127.0.0.1:3306', 'student', '123qwe', 'php_lesson_db');

          $dbError = mysqli_connect_errno();
          if ($dbError) {
            throw new Exception('Error: Could not connect to database. Please try again.');
          }

          // Searching for author name
          $query = 'select id from author where name = \''.$authorName.'\'';
          $result = $db->query($query);
          $resultCount = $result->num_rows;

          //correction acknowledged
          // Place this after the if statement on line 35. - oks na sir
          // Also include the code block on lines 55 to 63.
          // This is to adhere to a coding practice of DRY (Don't Repeat Yourself).
          if ($resultCount == 0) {

            // Note: Nope, not here. Also include the code that will make sense after this.
            $query = 'insert into book (img_url, title, isbn, author_id) values (?, ?, ?, ?)';
            $stmt = $db->prepare($query);
            $stmt->bind_param("ssss", $imageUrl, $bookTitle, $isbn, $authorId);

            $stmt->execute();

            $query = 'insert into author (name) values (?)';
            $stmt = $db->prepare($query);
            $stmt->bind_param("s", $authorName);

            $stmt->execute();

            $query = 'select id from author where name = \''.$authorName.'\'';
            $result = $db->query($query);
            $row = $result -> fetch_assoc();

            // assigning the newly-created author id to a variable
            $authorId = $row['id'];

            // Clue: Should we be tracking if the author was added? Or was it the book?
            @ $affectedRows = $stmt->$affected_rows;

            if ($affectedRows > 0) {
              throw new Exception("Error: Author was not added.");
            }else {
              echo $affectedRows."book successfully inserted into the database.";
            }

            $stmt->close();
          }else {

            $query = 'select id from author where name = \''.$authorName.'\'';
            $result = $db->query($query);
            $row = $result -> fetch_assoc();

            $authorId = $row['id'];

            $query = 'insert into book (img_url, title, isbn, author_id) values (?, ?, ?, ?)';
            $stmt = $db->prepare($query);
            $stmt->bind_param("ssss", $imageUrl, $bookTitle, $isbn, $authorId);

            $stmt->execute();

            // Clue: This code below feels really similar to line 54
            @ $affectedRows = $stmt->$affected_rows;

            if ($affectedRows > 0) {
              throw new Exception("Error: Author was not added.");
            }else {
              echo $affectedRows."book successfully inserted into the database.";
            }

            $stmt->close();
          }

          // Clue: Any code placed here will be executed regardless author id exists or not.

        } catch (Exception $e) {
          echo $e->getMessage();
        }

     ?>
</div>
<div class="card-footer">
  <a class="btn btn-dark" href="book-add.php">Back</a>
</div>

<?php require_once('view-comp/footer.php'); ?>
