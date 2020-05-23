<?php require_once('view-comp/header.php'); ?>
<?php
  function startsWith($string, $char){
   $length = strlen($char);
   return (substr($string, 0, $length) === $char);
  }
?>
<div class="card-header">
  Add Book Result
</div>
<div class="card-body">
  <?php
    $title = $_POST['bookTitle'];
    $author = $_POST['authorName'];
    $isbn = $_POST['isbn'];
    $imgUrl = $_POST['img-url'];
    $authorID = 0;

    try {
      if(startsWith($title," ") || startsWith($author," ") || startsWith($isbn," ") || startsWith($imgUrl," ") ){
        throw new Exception("Input(s) must not start with a space.");
      } else {
        @ $db = new mysqli('127.0.0.1:3306','IamJaycee18', '1234567890', 'php_lesson_db');
        $dbError = mysqli_connect_errno();

        if($dbError){
          throw new Exception("DB CONNECTION ERROR");
        }else{
          $selectAuthor = 'SELECT name FROM author WHERE name = "'.$author.'"';
          $resultAuthor = $db->query($selectAuthor);
          $resultAuthorCnt = $resultAuthor->num_rows;

          if($resultAuthorCnt<1){
            $insertAuthor = 'INSERT INTO author(name) VALUES (?)';
            $stmnt = $db->prepare($insertAuthor);
            $stmnt->bind_param("s", $author);
            $stmnt->execute();

            if(!$stmnt){
              throw new Exception('ERROR: Author was not added db.');
            }else {
              echo $author." : A new Author is inserted to db.";
            }

            $selectAuthorID = 'SELECT id FROM author WHERE name = "'.$author.'"';
            $resultAuthorID = $db->query($selectAuthorID);
            $authorID = $resultAuthorID->fetch_assoc();
          } else {
            $selectAuthorID = 'SELECT id FROM author WHERE name = "'.$author.'"';
            $resultAuthorID = $db->query($selectAuthorID);
            $authorID = $resultAuthorID->fetch_assoc();
          }

          $insertBook = 'INSERT INTO book(img_dir,title,isbn,author_id) VALUES (?,?,?,?)';
          $stmt = $db->prepare($insertBook);
          $stmt->bind_param("sssi", $imgUrl,$title,$author,$authorID['id']);
          $stmt->execute();

          if(!$stmt){
            throw new Exception('ERROR: Book was not added db.');
          }else {
            echo $title." : A new Book is inserted to db.";

            echo '<div class="card col-5 mx-1">';
            echo '<div class="card-body">';
            echo '<div class="row">';
            echo '<div class="col-5">';
            echo '<img width="150px" height="200px" src="'.$imgUrl.'">';
            echo '</div>';
            echo '<div class="col-4">';
            echo '<h6>'.$title.'</h6>';
            echo '<p>';
            echo 'By: '.$author.'<br>';
            echo 'ISBN: '.$isbn;
            echo '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

          }

        }
      }

    } catch (Exception $e) {
      echo $e->getMessage();
    }
  ?>


  <div class="card-footer">
    <a href="book-add.php">
      <button class="btn btn-secondary" >Back</button>
    </a>
  </div>

</div>
<?php require_once('view-comp/footer.php'); ?>
