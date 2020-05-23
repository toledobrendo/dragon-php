<?php 
	require_once('view-comp/header.php');
 ?>

<div class="card-header">Add Author Result</div>
<div class="card-body">
	<?php 
		$authorName = $_POST['authorName'];

		try {
			if(!$authorName) {
				throw new Exception('Author details not complete. Please try again.');
			}	

			// db connection
 			@ $db = new mysqli('127.0.0.1:3306', 'user', '123qwe', 'php_lesson_db');

 			// error checking
 			$dbError = mysqli_connect_errno();
 			if ($dbError) {
 				throw new Exception('Could not connect to database. Try again. Error '.$dbError, 1);
 			}

			// query by query string concatenation

			// // sql statement
			// $query = 'INSERT INTO author (name) VALUES (\''.$authorName.'\')';

			// // execute
			// $result = $db->query($query);

			// if($result) {
			// 	echo $db->affected_rows." author inserted into the database.";
			// } else {
			// 	throw new Exception('Error: The author was not added.');
			// }
			
 			// removes special characters
 			// $authorName = $db->real_escape_string($authorName);

 			// query by prepared statements
 			$query = 'INSERT INTO author (name) VALUES (?)';
 			$stmt = $db->prepare($query);
 			$stmt->bind_param("s", $authorName);
 			$stmt->execute();
 			
 			$affectedRows = $stmt->affected_rows;
 			if($affectedRows > 0) {
 				echo $stmt->affected_rows.' author inserted into the database.';
 			} else {
 				throw new Exception('Error: The author was not added.');
 			}
 			$stmt->close();

		} catch(Exception $e) {
			echo $e->getMessage();
		}
	 ?>
	 
</div>
<div class="card-footer">
	 <a href="author-add.php" class="btn btn-secondary">Back</a>
</div>	

<?php 
	require_once('view-comp/footer.php');
 ?>