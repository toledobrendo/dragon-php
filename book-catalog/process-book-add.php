<?php
	require_once('view-comp/header.php');
	require_once('service/log-service.php');
	require_once('service/add-service.php');
?>

<div class="card-header">
	Add Book Result
</div>

<div class="card-body">
	<?php
		$bookTitle = $_POST['bookTitle'];
		$authorName = $_POST['authorName'];
		$isbn = $_POST['isbn'];
		$imgURL = $_POST['imgURL'];

		try {
			if(!$bookTitle) {
				throw new Exception('Book title incomplete. Please try again.');
			} else if(!$authorName) {
				throw new Exception('Author details incomplete. Please try again.');
			} else if(!$isbn) {
				throw new Exception('ISBN incomplete. Please try again.');
			} else if(!$imgURL) {
				throw new Exception('Image URL incomplete. Please try again.');
			}

			@ $db = new mysqli('127.0.0.1:3306', 'user', '123qwe', 'php_lesson_db');
			$dbError = mysqli_connect_errno();

			if($dbError) {
				throw new Exception('Error: Could not connect to database. Please try again later');
			}

			if(getAuthorCount($db, $authorName) == 0) {
				addAuthor($db, $authorName);
			}

			//getting the corresponding author ID number through name input 
			$queryStringAuthorID = 'SELECT author.id AS author_id FROM author WHERE author.name LIKE \'%' . $authorName .'%\'';
			logMessage($queryStringAuthorID);
			$resultAuthorID = $db->query($queryStringAuthorID);
			$convertResultAuthorID = $resultAuthorID->fetch_assoc(); //converts the row data to corresponding data types

			//inserts the new book into the database with the previous code to set the author_id
			$queryStringInsertBook = 'INSERT INTO book (title, isbn, pic_url, author_id) VALUES (?, ?, ?, ?)';
			$stmtInsertBook = $db->prepare($queryStringInsertBook);
			$stmtInsertBook->bind_param('sssi', $bookTitle, $isbn, $imgURL, $convertResultAuthorID['author_id']);
			$stmtInsertBook->execute();

			$affectedRows = $stmtInsertBook->affected_rows;

			if($affectedRows > 0){
				echo $affectedRows .' book inserted into database.';
			} else {
				throw new Exception("Error: The book was not added");
			}

			$stmtInsertBook->close();

		} catch(Exception $e) {
			error_log($e->getMessage());
			echo $e->getMessage();
		}
	?>
</div>

<div class='card-footer'>
	<a href="book-add.php" class="btn btn-danger float-right">Go Back</a>
</div>

<?php
	require_once('view-comp/footer.php');
?>