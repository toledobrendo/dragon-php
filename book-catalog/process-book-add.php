<?php 
  require_once('view-comp/header.php'); 
?>

<div class="card-header">Add Book Result</div>
  <div class="card-body">
    <?php 
    $bookTitle = $_POST['bookTitle'];
    $authorName = $_POST['authorName'];
    $isbn = $_POST['isbn'];
    $imageURL = $_POST['imageURL'];

    try{
      if(!$bookTitle  && !$authorName  && !$isbn  && !$imageURL){
        throw new Exception('Book details are not complete. Please try again');
      }

      @ $db = new mysqli ('localhost', 'user','pass','php_lesson_db');

      $dbError = mysqli_connect_errno();
      if ($dbError) {
        throw new Exception('Error: Could not connect to database. Please try again later.');
      }

      //check if author exists
      $queryAuthor = 'SELECT id FROM author WHERE name = ?';
      
      $stmtAuthor = $db->prepare($queryAuthor);
      $stmtAuthor->bind_param("s", $authorName);
      $stmtAuthor->execute();
      $res = $stmtAuthor->get_result();

      if($res->num_rows === 0) { //author does not exist
        //insert new author
        $queryNewAuthor = 'INSERT INTO author (name) values (?)';
        $stmtNewAuthor = $db->prepare($queryNewAuthor);
        $stmtNewAuthor->bind_param("s", $authorName);
        $stmtNewAuthor->execute();

        //get id of new author
        $queryGetAuthorId = 'SELECT id FROM author WHERE name = ?';
        $stmtGetAuthorId = $db->prepare($queryGetAuthorId);
        $stmtGetAuthorId->bind_param("s", $authorName);
        $stmtGetAuthorId->execute();

        $res = $stmtGetAuthorId->get_result();

        $stmtNewAuthor->close();
      }
      
      //store author id for inserting book
      while($row = $res->fetch_assoc()) {
        $authorId = $row['id'];
      }

      $stmtAuthor->close();

      //insert book to db
      $queryBook = 'INSERT INTO book (title, isbn, author_id, pic_url) values (?,?,?,?)';

      $stmtBook = $db->prepare($queryBook);
      $stmtBook->bind_param("ssis", $bookTitle, $isbn, $authorId, $imageURL);
      $stmtBook->execute();

      $affected_rows = $stmtBook->affected_rows;

      if($affected_rows > 0){
        echo $stmtBook->affected_rows. " book inserted into the database.";
      } else {
        throw new Exception("Error: Book was not added.");
      }
      
      $stmtBook->close();
    } catch (Exception $e){
      echo $e->getMessage();
    } 

    ?>    
</div>

<div class="card-footer">
  <a class="btn btn-secondary" href="book-add.php">Back</a>
</div>

<?php 
  require_once('view-comp/footer.php'); 
?>