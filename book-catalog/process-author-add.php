<?php require_once('view-comp/header.php'); ?>
<div class="card-header">
  Add Author Result
</div>
<div class="card-body">
  <?php
    $authorName = $_POST['authorName'];
    try {
      if(!$authorName){
        throw new Exception("Author details not complete. Try Again!");
      } else {
	      @ $db = new mysqli('127.0.0.1:3306','IamJaycee18', '1234567890', 'php_lesson_db');
        $dbError = mysqli_connect_errno();

  			if($dbError){
  				throw new Exception("DB CONNECTION ERROR");
  			}else{
          $insertQuery = 'INSERT INTO author(name)
              values '.$_POST['authorName'].'
              WHERE NOT EXIST(
                SELECT name FROM author WHERE name = '.$_POST['authorName'].'
                )' ;
          $result = $db->query($insertQuery);
          echo $result;
          if ($result) {
            echo $db->affected_rows." author inserted to db.";
          } else {
            throw new Exception('ERROR: Author was not added db.');
          }
        }
      }
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  ?>
  <div class="card-footer">
    <a href="author-add.php">
      <button class="btn btn-secondary" >Back</button>
    </a>
  </div>
</div>
<?php require_once('view-comp/footer.php'); ?>
