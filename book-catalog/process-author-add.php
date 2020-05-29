<?php 
  require_once('view-comp/header.php'); 
?>

<div class="card-header">Add Author Result</div>
  <div class="card-body">
    <?php 
      $authorName = $_POST['authorName'];

      try{
        if(!$authorName){
          throw new Exception('Author details are not complete. Please try again');
        }

        @ $db = new mysqli ('localhost', 'user','pass','php_lesson_db');

        $dbError = mysqli_connect_errno();
        if ($dbError) {
          throw new Exception('Error: Could not connect to database. Please try again later.');
        }

        //Query by query string concatenation

        // $query = 'INSERT INTO author (name) values (\''.$authorName.'\')';

        // $result = $db->query($query);

        // if($result){
        //   echo $db->affected_rows. " author inserted into the database.";
        // } else{
        //   throw new Exception('Error: The author was not added.');
        // }

        //Query by prepared statements
        $query = 'INSERT INTO author (name) values (?)';
        $stmt = $db->prepare($query);
        $stmt->bind_param("s", $authorName);
        $stmt->execute();

        $affected_rows = $stmt->affected_rows;
        if($affected_rows > 0){
            echo $stmt->affected_rows. " author inserted into the database.";
        } else {
          throw new Exception("Error: Author was not added.");
        }

        $stmt->close();
      } catch (Exception $e){
        // error_log($e->getMessage());
          echo $e->getMessage();
      }    
    ?>
  </div>

  <div class="card-footer">
    <a class="btn btn-secondary" href="author-add.php">Back</a>
  </div>

<?php 
  require_once('view-comp/footer.php'); 
?>