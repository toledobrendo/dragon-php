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
      if (!$bookTitle || !$authorName || !$isbn || !$picURL) {
        throw new Exception('Book details are not complete. Please try again.');
      }

      @ $db = new mysqli('127.0.0.1:3306', 'student', '123qwe', 'php_lesson_db');

      $dbError = mysqli_connect_errno();
      if ($dbError) {
        throw new Exception('Error: Could not connect to database. Please try again later.');
      }

      //Making sure there will be no SQL injection
      $bookTitle = $db->real_escape_string($bookTitle);
      $authorName = $db->real_escape_string($authorName);
      $isbn = $db->real_escape_string($isbn);
      $picURL = $db->real_escape_string($picURL);

      $authorID = 0; //Should be overriden later

      //First check if author exist in table
      //Select the author's name in the author table
      $selectAuthorQuery = 'select * from author where name = ?';
      $selectAuthorStmnt = $db->prepare($selectAuthorQuery);
      $selectAuthorStmnt->bind_param('s', $authorName);
      $selectAuthorStmnt->execute();
      $authorExistResult = $selectAuthorStmnt->get_result();

      $authorResultCount = $authorExistResult->num_rows;
      if ($authorResultCount > 0) {
        //If already exists, get authorID
        $authorRow = $authorExistResult->fetch_assoc();
        $authorID = $authorRow['id'];
      } else {
        //else, add author then get authorID
        $addAuthorQuery = 'insert into author (name) values (?)';
        $addAuthorstmt = $db->prepare($addAuthorQuery);
        $addAuthorstmt->bind_param("s", $authorName);
        $addAuthorstmt->execute();
        $addAuthorstmt->close();

        //select the author again for the id
        $reselectAuthorStmnt = $db->prepare($selectAuthorQuery);
        $reselectAuthorStmnt->bind_param('s', $authorName);
        $reselectAuthorStmnt->execute();
        $authorExistResult = $selectAuthorStmnt->get_result();

        $authorRow = $authorExistResult->fetch_assoc();
        $authorID = $authorRow['id'];
        $reselectAuthorStmnt->close();
      }
      $selectAuthorStmnt->close();

      // Query by prepared statements
      $addBookQuery = 'insert into book (title, isbn, author_id, pic_url) values (?, ?, ?, ?)';
      $addBookStmt = $db->prepare($addBookQuery);
      $addBookStmt->bind_param("ssis", $bookTitle, $isbn, $authorID, $picURL);
      $addBookStmt->execute();

      $affectedRows = $addBookStmt->affected_rows;
      if ($affectedRows > 0) {
        echo $affectedRows." book inserted into the database.";
      } else {
        throw new Exception('Error: The book was not added.');
      }
      $addBookStmt->close();

    } catch (Exception $e) {
      echo $e->getMessage();
    }
  ?>
</div>
<div class="card-footer">
  <a class="btn btn-secondary" href="book-add.php">Back</a>
</div>
<?php require_once('view/footer.php'); ?>
