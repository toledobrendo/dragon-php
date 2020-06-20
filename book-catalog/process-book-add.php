<?php require_once './view-comp/header.php' ?>
<div class="card-header">
  Add Book Result
</div>
<div class="card-body">
  <?php
    $title = $_POST['title'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];
    $thumbnail = $_POST['thumbnail'];

    try{
      if (!$title || !$author || !$isbn || !$thumbnail) {
        throw new Exception('Book details incomplete. Please try again.');
      }

      @ $db = new mysqli('127.0.0.1:3306','student','cndpgmfNhbsXbild','php_lesson_db');

      $dbError = mysqli_connect_errno();
      if ($dbError) {
        throw new Exception('Error: Could not connect to database. Please try again later.');
      }

      $authorExists = 'INSERT INTO author (name)
         SELECT * FROM (SELECT ? AS name) AS temp
         WHERE NOT EXISTS (SELECT name FROM author WHERE name=?)LIMIT 1';
      $stmt = $db->prepare($authorExists);
      $stmt->bind_param("ss", $author, $author);
      $stmt->execute();
      $stmt->close();

      $query = 'INSERT INTO book (title, isbn, author_id, thumbnail)
         SELECT * FROM (SELECT ? AS title, ? AS isbn,
           (SELECT id FROM author WHERE name = ?) AS author_id, ? AS thumbnail) AS temp
         WHERE NOT EXISTS (SELECT isbn FROM book WHERE isbn=?)  LIMIT 1';
      $stmt = $db->prepare($query);
      $stmt->bind_param("sssss", $title, $isbn, $author, $thumbnail, $isbn);
      $stmt->execute();

      $affectedRows = $stmt->affected_rows;
      if ($affectedRows > 0) {
        echo "Book successfully added into the database.";
      } else {
        throw new Exception('Book already exists.');
      }

      $stmt->close();

    } catch (Exception $e) {
      echo $e->getMessage();
    }
  ?>
</div>
<div class="card-footer">
  <a class="btn btn-secondary" href="book-add.php">Back</a>
</div>
<?php require_once './view-comp/footer.php'; ?>
