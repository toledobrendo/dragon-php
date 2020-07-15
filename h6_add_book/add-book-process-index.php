<!DOCTYPE html>
<?php
require_once 'view/header.php';
require_once 'sql/db-config.php';
?>

<h3 class="card-header"> Book Results </h3>
<div class="card-body">

  <?php
  try {

    $dbError = mysqli_connect_errno();
    if($dbError)
    {
      throw new Exception('<b> Error Could not Connect to the Database.</br> Error Code: </b> ' .$dbError ,1);
    }

    if(isset($_POST['search-book']))
    {
      $book_title   =   $_POST['book-title'];
      $isbn         =   $_POST['isbn'];
      $image_url  =   $_POST['image-url'];
      $author_title =   $_POST['author-title'];

      $queryAuthor = "INSERT INTO author (name)
      VALUES (?)";
      $stmntAuthor = $db->prepare($queryAuthor);
      $stmntAuthor->bind_param("s",$author_title);

      $rowSQL =  "SELECT MAX( author_id ) AS max FROM book;" ;
      $row =  $db->query($rowSQL) ;
      $largestNumber = $row->fetch_assoc();
      $authId = $largestNumber['max'] + 1;

      $queryBook = "INSERT INTO book (title, isbn, pic_url, author_id)
      VALUES (?,?,?,?)";
      $stmntBook = $db->prepare($queryBook);
      $stmntBook->bind_param("ssss", $book_title, $isbn, $image_url, $authId);

      $result =  $stmntAuthor->execute() && $stmntBook->execute();
      $closeStmnt =  $stmntAuthor->close() && $stmntBook->close();
      if($result && $closeStmnt)
      {
        echo '<script type = "text/javascript">
          alert("Author and Book added");
          </script>';
      }
      else
      {
        echo 'Error in Excuting Query';
      }
    }

  }
  catch (Exception $e) {
    echo $e->getMessage();
    echo '<script type = "text/javascript">
      alert("Error Could not Connect to the Database; please try again later")
      </script>';
  }


   ?>

<a class = "btn btn-secondary" href = add-book-index.php>Go Back To Home Page </a>
</div>





<?php require_once 'view/footer.php';?>

<!-- // $queryAuthorId = "SELECT MAX(author_id) AS maxId FROM book";
// $authorId = $db->query($queryAuthorId);
// $row = mysqli_fetch_assoc($rowSQL);
// $largestUID = $row['max'];
// echo $largestUID; -->

<!-- //get the author_id then create a loop na every iteration add 1
$rowSQL =  "SELECT MAX( author_id ) AS max FROM book;" ;
$row =  $db->query($rowSQL) ;
$largestNumber = $row->fetch_assoc(); -->
