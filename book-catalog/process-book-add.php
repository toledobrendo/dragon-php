<?php
	require_once('view-comp/header.php');
?>

<div class="card-header">Add Book Result</div>

<div class="card-body">

	<?php 

		$bookTitle = $_POST['bookTitle'];
		$authorName = $_POST['authorName'];
		$isbn = $_POST['isbn'];
		$imageURL = $_POST['imageURL'];

		try {

			if(!$bookTitle || !$authorName || !$isbn || !$imageURL) {
				throw new Exception('Book details not complete. Please try again.');
			}

			$db = new mysqli('127.0.0.1:3306', 'student', 'mydev040100', 'php_lesson_db');

			$dbError = mysqli_connect_errno();

			if($dbError) {
				throw new Exception('Error: Could not connect to database. Please try again later. '.$dbError, 1);
			}


		    $id_query = 'SELECT * FROM author WHERE name = '.$authorName;
			$result = $db->query($id_query);
			$row = $result->fetch_assoc();

			$query = 'INSERT INTO book (title, author_id, isbn, image_src) values (?, ?, ?, ?)';

		    $stmt = $db->prepare($query);
		    $stmt->bind_param("ssss", $bookTitle, $row['id'], $isbn, $imageURL);
		    $stmt->execute();

		    $affectedRows = $stmt->affected_rows;
		    if ($affectedRows > 0) {
		    	echo $affectedRows." book inserted into the database.";
		   	} else {
		    	throw new Exception('Error: The book was not added.');
		    }
   
		    $stmt->close();
								
		} catch (Exception $e) {
			echo $e->getMessage();
		}

	?>

</div>

<div class="card-footer">
	<a class="btn btn-secondary" href="author-add.php">Back</a>
</div>

</body>
</html>