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
          }else{

            // Searching for author name
             $query = 'select id from author where name = \''.$authorName.'\'';
             $result = $db->query($query);
             $resultCount = $result->num_rows;


                if($resultCount == 0){

                  // Inserting new author
                  $query = 'insert into author (name) values (?)';
                  $stmt = $db->prepare($query);
                  $stmt->bind_param("s", $authorName);

                  $stmt->execute();
                  $stmt->close();

                  $query = 'select id from author where name = \''.$authorName.'\'';
                  $result = $db->query($query);
                }

            $authorMatch = $result -> fetch_assoc();
            $authorId = $authorMatch['id'];

            $query = 'insert into book (img_url, title, isbn, author_id) values (?, ?, ?, ?)';
            $stmt = $db->prepare($query);
            $stmt->bind_param("ssss", $imageUrl, $bookTitle, $isbn, $authorId);

            $stmt->execute();

            @ $affectedRows = $stmt->$affected_rows;

              if ($affectedRows > 0) {
                throw new Exception("Error: Book was not added.");
              }else {
                echo $affectedRows."book successfully inserted into the database.";
              }

            $stmt->close();

          }

        } catch (Exception $e) {
          echo $e->getMessage();
        }

     ?>
</div>
<div class="card-footer">
  <a class="btn btn-dark" href="book-add.php">Back</a>
</div>

<?php require_once('view-comp/footer.php'); ?>
