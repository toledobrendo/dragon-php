
<?php require_once('view-comp/header.php');
require_once('service/log-service.php'); ?>
<div class="card-header">
  Add Book Result
</div>
<div class="card-body">
    <?php
      $bookTitle = $_POST['bookTitle'];
      $authorName = $_POST['authorName'];
      $isbn = $_POST['isbn'];
      $imgurl = $_POST['imgurl'];

      try{
        if(!$bookTitle || !$authorName || !$isbn || !$imgurl){
        throw new Exception('Book details not complete. Please Try Again.');
        }

        @ $db = new mysqli('127.0.0.1:3306', 'student', '123qwe', 'php_lesson_db');
        $dbError = mysqli_connect_errno();
        if ($dbError) {
        throw new Exception('Error: Could not connect to database. '.
          'Please try again later. '.$dbError, 1);
        }

        // $query = 'insert into author (name) values(\''.$authorName.'\')';
        // $result = $db->query($query);

        // if ($result) {
        //   echo $db->affected_rows."author inserted into the database.";
        // }
        // else{
        //   throw new Exception('Error: the author was not added');
          
        // }

        //query by prepared statements
        //Note: What if author already exists?
        $query= 'insert into author(name) values(?)';
        $stmt =  $db->prepare($query);
        $stmt->bind_param("s",$authorName);
        $stmt->execute();

        $authorquery = 'SELECT id as author_id FROM author WHERE name = "'.$authorName.'"';
        $stmt =  $db->prepare($authorquery);
        $result = $db->query($authorquery);
        $row = $result -> fetch_assoc();

        $bookQuery = 'INSERT INTO book (title, isbn, author_id,img_url) values(?,?,?,?)';
        $stmt =  $db->prepare($bookQuery);
        $stmt->bind_param("ssis",$bookTitle,$isbn,$row['author_id'],$imgurl);
        $stmt->execute();

        
        $affectedRows = $stmt->affected_rows;
        if ($affectedRows > 0) {
          echo $affectedRows."Book inserted to the database";
        }else{
          throw new Exception('Error: The author was not added');          
        }

        $stmt->close();
      } catch(Exception $e){
        echo $e->getMessage();
      }
      
    ?>


</div>
<div class="card-footer">
  <a class="btn btn-secondary" href="author-add.php">go back</a>
</div>
<?php require_once('view-comp/footer.php'); ?>
