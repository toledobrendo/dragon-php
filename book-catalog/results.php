<?php require_once('view-comp/header.php') ?>
<div class="card-header">
  Book Results
</div>
<div class="card-body">
  <?php
    define('FIELDS', array(
      'author' => 'author.name',
      'title' => 'book.title',
      'isbn' => 'book.isbn'
    ));

    $searchType = $_POST['searchType'];
    $searchTerm = $_POST['searchTerm'];

    try {
      if (!$searchType || !$searchTerm) {
        throw new Exception('You have not entered search details. Please go back and try again.', 1);
      }

      @ $db = new mysqli('127.0.0.1:3306', 'student', '123qwe', 'php_lesson_db');

      $dbError = mysqli_connect_error();
      if ($dbError) {
        throw new Exception('Error: could not connect to database. Please try again later. '.$dbError, 1);
      }

      $query = 'SELECT author.name as author_name, book.title, book.isbn, book.pic_url FROM book INNER JOIN author ON author.id = book.author_id WHERE '.FIELDS[$searchType].' like \'%'.$searchTerm.'%\';';

      $result = $db->query($query);

      $resultCount = $result->num_rows;

      echo "<p>Result for $searchType : $searchTerm</br>";
      echo "Number of books found : $resultCount</p>";

      echo "<div class='row'>";
      for ($ctr=0; $ctr < $resultCount; $ctr++) {
        $row = $result -> fetch_assoc();
    ?>
    <div class="card col-4 mx-3">
      <div class="card-body">
        <div class="col-5">
          <?php echo '<img src="'.$row['pic_url'].'" class="img-thumbnail img-fluid w-100 h-200 float-left mx-1 ">'; ?>
        </div>
        <div class="col-12">
          <h6><?php echo $row['title']; ?></h6>
          <p>
            By: <?php echo $row['author_name']; ?><br/>
            <?php echo $row['isbn']; ?>
          </p>
        </div>
      </div>
    </div>
    <?php
      }
      echo "</div>";
   } catch (Exception $e) {
      echo $e->getMessage();
      echo '<br/>';
      echo '<a class="butn btn-secondary my-3" href="index.php>Go Back</a>"';
    }
  ?>

  <a class="btn btn-secondary my-3" href="index.php">Go Back</a>
</div>
<?php require_once('view-comp/footer.php') ?>
