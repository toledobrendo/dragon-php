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

			// check if author already exists in the db
		    $getAuthorIdQuery = 'SELECT id FROM author WHERE name = "'.$authorName.'"';
		    $result = $db->query($getAuthorIdQuery);
		    $resultCount = $result->num_rows;

		    // author does not exist in the db
		    if($resultCount == 0) {

		    	// add new author into the author table
			    $addAuthorQuery = 'INSERT INTO author (name) values (?)';
			    $authorStmt = $db->prepare($addAuthorQuery);
			    $authorStmt->bind_param("s", $authorName);
			    $authorStmt->execute();

			    // echo the result to the user
			    $authorAffectedRows = $authorStmt->affected_rows;
			    if ($authorAffectedRows < 0) {
			      throw new Exception('Error: The author was not added.');
			    }

			    $authorStmt->close();

			    // get the id of the author that was newly inserted
		    	$getAuthorIdQuery = 'SELECT id FROM author WHERE name = "'.$authorName.'"';
		    	$result = $db->query($getAuthorIdQuery);
			}

			$row = $result->fetch_assoc();

			// check if book already exists in the db
		    $getBookIdQuery = 'SELECT id FROM book WHERE author_id = "'.$row['id'].'" AND title = "'.$bookTitle.'" AND isbn = "'.$isbn.'"';
		    $result = $db->query($getBookIdQuery);
		    $resultCount = $result->num_rows;

		    // book does not exist in the db
		    if($resultCount == 0) {

				// add the new book onto the database
				$addBookQuery = 'INSERT INTO book (title, author_id, isbn, image_src) values (?, ?, ?, ?)';
				$bookStmt = $db->prepare($addBookQuery);
				$bookStmt->bind_param("siss", $bookTitle, $row['id'], $isbn, $imageURL);
				$bookStmt->execute();

				// echo the result of this to the user
				$bookAffectedRows = $bookStmt->affected_rows;
				if ($bookAffectedRows > 0) {
					echo $bookAffectedRows." book was successfully inserted into the database.";
				} else {
					 throw new Exception('Error: The book was not added.');
				}

				$bookStmt->close();

			} else {
				throw new Exception('Unable to add book. The book you entered is already in the database.');
			}

		}catch (Exception $e) {
			echo $e->getMessage();
		}

	?>

</div>

<div class="card-footer">
	<a class="btn btn-secondary" href="book-add.php">Back</a>
</div>

</body>
</html>