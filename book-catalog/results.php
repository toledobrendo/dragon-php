<?php
require_once './view-comp/header.php';

$searchType = $_POST['searchType'];
$searchTerm = $_POST['searchTerm'];

define('FIELDS', array(
  'author' => 'author.name',
  'title' => 'book.title',
  'isbn' => 'book.isbn'));
?>
<div class="card-header">
  Search Results
</div>
<div class="card-body">
  <?php
  try {
    if(!$searchType || !$searchTerm) {
      echo 'You have not entered search details. Please go back and try again';
    } else {
      @ $db = new mysqli('127.0.0.1:3306','student','cndpgmfNhbsXbild','php_lesson_db');

      $dbError = mysqli_connect_errno();

      if($dbError) {
        throw new Exception('Error: Could not connect to database. '.
          'Please try again later. '.$dbError, 1);
      }

      $query = "SELECT author.name AS author_name, book.title, book.isbn, book.thumbnail
      FROM book INNER JOIN author ON author.id = book.author_id
      WHERE ".FIELDS[$searchType]." LIKE '%".$searchTerm."%';";

      $result = $db->query($query);

      $resultCount = $result->num_rows;

      echo "<p>Result for ".$searchType." : ".$searchTerm;
      echo "<p>Number of books found: ".$resultCount;

      echo "<div class='row'>";

      for ($ctr = 0; $ctr < $resultCount; $ctr++) {
            $row = $result->fetch_assoc();
    ?>
      <div class="card col-6">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <img src="<?php echo $row['thumbnail']; ?>" width="200px" alt="">
            </div>
            <div class="col">
              <h6><?php echo $row['title']; ?></h6>
              <p>
                By: <?php echo $row['author_name']; ?><br/>
                <?php echo $row['isbn']; ?>
              </p>
            </div>
          </div>
        </div>
      </div>
  <?php
      }
    }
  } catch (Exception $e) {
    echo $e->getMessage();
  }
  ?>
  </div>
  <br>
  <a class="btn btn-secondary" href="index.php">Go Back</a>
</div>
<?php require_once './view-comp/footer.php'; ?>
