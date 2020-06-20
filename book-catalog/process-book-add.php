<?php 
	require_once('view-comp/header.php');
	require_once('service/log-service.php');
 ?>

<div class="card-header">Add Book Result</div>
<div class="card-body">
	<?php 
		$bookTitle = $_POST['bookTitle'];
		$authorName = $_POST['authorName'];
		$bookISBN = $_POST['bookISBN'];
		$bookImage = $_POST['bookImage'];

		try {
			if(!$bookTitle || !$authorName || !$bookISBN || !$bookImage) {
				throw new Exception('Book details not complete. Please try again.');
			}	

			// db connection
 			@ $db = new mysqli('127.0.0.1:3306', 'user', '123qwe', 'php_lesson_db');

 			// error checking
 			$dbError = mysqli_connect_errno();
 			if ($dbError) {
 				throw new Exception('Could not connect to database. Try again. Error '.$dbError, 1);
 			}

 			// check duplicates

 			//if (getAuthorCount($db,$authorName) > 0) {
	        	//throw new Exception('Error: Author already exists');
	        //}

	        //if (getBookCount($db,$bookTitle) > 0) {
	        	//throw new Exception('Error: Book already exists');
	        // }

 			// author query
			// Note: What if author already exists?
	        $authorQuery = 'INSERT INTO author (name) VALUES (?)';
 			$authorStmt = $db->prepare($authorQuery);
 			$authorStmt->bind_param("s", $authorName);
 			$authorStmt->execute();
 			
 			$affectedRows = $authorStmt->affected_rows;
 			if($affectedRows > 0) {
 				echo $authorStmt->affected_rows.' author inserted into the database. ';
 			} else {
 				throw new Exception('Error: The author was not added. ');
 			}
 			$authorStmt->close();

 			// select author based on their id
 			$selectAuthorQuery = 'SELECT id as author_id
 				FROM author
 				WHERE name = "'.$authorName.'"';

 			logMessage($selectAuthorQuery);

 			// execute
			$result = $db->query($selectAuthorQuery);

			// store result
 			$row = $result->fetch_assoc();

 			// book query
 			$bookQuery = 'INSERT INTO book (title, isbn, author_id, img_url) VALUES (?, ?, ?, ?)';
 			$bookStmt = $db->prepare($bookQuery);
 			$bookStmt->bind_param("ssis", $bookTitle, $bookISBN, $row['author_id'], $bookImage);
 			$bookStmt->execute();
 			
 			$affectedRows = $bookStmt->affected_rows;
 			if($affectedRows > 0) {
 				echo $bookStmt->affected_rows.' book inserted into the database. ';
 			} else {
 				throw new Exception('Error: The book was not added. ');
 			}
 			$bookStmt->close();

		} catch(Exception $e) {
			echo $e->getMessage();
		}
	 ?>
	 
</div>
<div class="card-footer">
	 <a href="book-add.php" class="btn btn-secondary">Back</a>
</div>	

<?php 
	require_once('view-comp/footer.php');
 ?>
