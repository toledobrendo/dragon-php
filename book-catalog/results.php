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

      $query = "SELECT author.name AS author_name, book.title, book.isbn
      FROM book INNER JOIN author ON author.id = book.author_id
      WHERE ".FIELDS[$searchType]." LIKE '%".$searchTerm."%';";

      $result = $db->query($query);

      $resultCount = $result->num_rows;

      echo "<p>Result for ".$searchType." : ".$searchTerm;
      echo "<p>Number of books found: ".$resultCount;

      for ($ctr = 0; $ctr < $resultCount; $ctr++) {
            $row = $result->fetch_assoc();
    ?>
      <div class="card col-4">
        <div class="card-body">
            <h6><?php echo $row['title']; ?></h6>
            <p>
              By: <?php echo $row['author_name']; ?><br/>
              <?php echo $row['isbn']; ?>
            </p>
        </div>
      </div>
  <?php
      }
    }
  } catch (Exception $e) {
    echo $e->getMessage();
  }
  ?>
  <a class="btn btn-secondary" href="index.php">Go Back</a>
</div>
<?php require_once './view-comp/footer.php'; ?>
