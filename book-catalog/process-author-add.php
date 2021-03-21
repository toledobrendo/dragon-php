<?php
	require_once('view-comp/header.php');
	require_once('service/log-service.php');
	require_once('service/add-service.php');
?>

<div class="card-header">
	Add Author Result
</div>

<div class="card-body">
	<?php
		$authorName = $_POST['authorName'];

		try {
			if(!$authorName){
				throw new Exception('Author details incomplete. Please try again.');
			}

			@ $db = new mysqli('127.0.0.1:3306', 'user', '123qwe', 'php_lesson_db');
			$dbError = mysqli_connect_errno();

			if($dbError) {
				throw new Exception('Error: Could not connect to database. Please try again later');
			}
			if(getAuthorCount($db, $authorName) > 0) {
				throw new Exception('Error: Author already exists!');
			}

			//executing query by string concatenation, susceptible to SQL Injection
			// $query = 'INSERT INTO author (name) VALUES (\''. $authorName .'\')';
			// $result = $db->query($query);

			// if($result) {
			// 	echo $db->affected_rows .' author inserted into database.';
			// } else {
			// 	throw new Exception('Error: The author was not added.');
			// }

			//can still be cirumvented
			//$authorName = $db->real_escape_string($authorName); 

			//executing query by PreparedStatment
			// $queryString = 'INSERT INTO author (name) VALUES (?)';
			// $stmt = $db->prepare($queryString);
			// //s meaning String
			// $stmt->bind_param('s', $authorName);
			// $stmt->execute();

			// $affectedRows = $stmt->affected_rows;

			// if($affectedRows > 0){
			// 	echo $affectedRows .' author inserted into database.';
			// } else {
			// 	throw new Exception("Error: The author was not added");
			// }			

			// $stmt->close();

			addAuthor($db, $authorName);

		} catch(Exception $e) {
			error_log($e->getMessage());
			echo $e->getMessage();
		}
	?>
</div>

<div class='card-footer'>
	<a href="author-add.php" class="btn btn-danger float-right">Go Back</a>
</div>

<?php
	require_once('view-comp/footer.php');
?>