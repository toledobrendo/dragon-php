<?php
	require_once('view-comp/header.php');
?>

<div class="card-header">Add Author Result</div>

<div class="card-body">

	<?php 

		$authorName = $_POST['authorName'];

		try{
		    
		    if (!$authorName) {
		    	throw new Exception('Author details not complete. Please try again.');
		    }

		    @ $db = new mysqli('127.0.0.1:3306', 'student', 'mydev040100', 'php_lesson_db');

		    $dbError = mysqli_connect_errno();
		    if ($dbError) {
		    	throw new Exception('Error: Could not connect to database. Please try again later.');
		    }

	      	// Query by query string concatenation
	      	// $query = 'insert into author (name) values (\''.$authorName.'\')';
	      	// $result = $db->query($query);
	      	//
	      	// if ($result) {
	      	//   echo $db->affected_rows." author inserted into the database.";
	      	// } else {
	      	//   throw new Exception('Error: The author was not added.');
	      	// }

		    // $authorName = $db->real_escape_string($authorName);

		    // check if author already exists in the db
		    $getAuthorIdQuery = 'SELECT id FROM author WHERE name = "'.$authorName.'"';
		    $result = $db->query($getAuthorIdQuery);
		    $resultCount = $result->num_rows;

		    if($resultCount == 0) {

		    	// Query by prepared statements
			    $query = 'insert into author (name) values (?)';
			    $stmt = $db->prepare($query);
			    $stmt->bind_param("s", $authorName);
			    $stmt->execute();

			   	$affectedRows = $stmt->affected_rows;
			    if ($affectedRows > 0) {
			      echo $affectedRows." author successfully inserted into the database.";
			    } else {
			    	throw new Exception('Error: The author was not added.');
			    }

			    $stmt->close();
		    } else {
				throw new Exception('Error: This author already exists in the database.');
		    }
							
		} catch (Exception $e) {
			error_log($e->getMessage());
			echo $e->getMessage();
		}

	?>

</div>

<div class="card-footer">
	<a class="btn btn-secondary" href="author-add.php">Back</a>
</div>

</body>
</html>