<!DOCTYPE html>
<?php
require_once 'view/header.php';
?>

<h3 class="card-header"> Book Results </h3>
  <div class="card-body">
    <?php
    define('FIELDS', array(
      'author' => 'author.name',
      'title' => 'book.title',
      'isbn' => 'book.isbn'
    ));
      $searchType = $_POST['search-type'];
      $searchTerm = $_POST['search-term'];

      try
      {
        if(!$searchTerm||!$searchType)
        {
          throw new Exception('You have not entered the search details, please go back and try again',1);

        }
        //set in root, not sure kung papano gagana in other pc since iba iba db?
        @ $db = new mysqli ('127.0.0.1:3306', 'root', '', 'php_lesson_db');
        $dbError = mysqli_connect_errno();
        if($dbError)
        {
          throw new Exception('Error Could not Connect to the Database.</br> Error Code: ' .$dbError ,1);

        }
        $query = 'SELECT author.name as author_name, book.title, book.isbn, book.pic_url
          FROM book
          INNER JOIN author
             ON author.id = book.author_id
          WHERE '.FIELDS[$searchType].' LIKE  \'%' .$searchTerm.'%\';';

          //echo $query .'</br>';
          $result = $db->query($query);

          $resultCount = $result->num_rows;

          echo '<p> Result for '.$searchType.' : ' .$searchTerm. '</br>';
          echo 'Number of Results Found: ' .$resultCount;

          echo '<div class = row>';
          for($ctr = 0; $ctr < $resultCount; $ctr++)
          {
            $row = $result-> fetch_assoc();

    ?>

        <div class="card col-4">
          <div class="card-body">
            <h6> <?php echo $row['title']; ?> </h6>
            <p>
              By: <?php echo $row['author_name']; ?> <br/>
              <?php echo $row['isbn']; ?>
            </p>
            <img src = <?php echo $row['pic_url']; ?> alt="book_thumbnail" width="100" height="100">
          </div>
        </div>
    <?php
          }
          echo '</div>';
      }
      catch (Exception $e)
      {
        echo $e->getMessage();
      }

     ?>
   </div>
<a class = "btn btn-secondary" href = search-book-index.php> Go Back </a>



<?php require_once 'view/footer.php';?>
