<?php
	require_once('view-comp/header.php');
?>

<div class="card-header">Add Book Result</div>

<div class="card-body">
	<?php
		$bookTitle = $_POST['bookTitle'];
		$authorName = $_POST['authorName'];
		$isbn = $_POST['isbn'];
		$bookCover = $_POST['bookCover'];

		try {
			if (!$authorName || !$bookTitle || !$isbn || !$bookCover) {
				throw new Exception('Error: Please fill up every information.');
			}

			@ $db = new mysqli('localhost', 'root', '', 'php_lesson_db');


			$dbError = mysqli_connect_errno();
			if ($dbError) {
				throw new Exception('Error: Could not connect to database. Try again later!');
			}		

			// Query by String concatination
			// $query = 'insert into author(name) values (\''.$authorName.'\')';
			// $result = $db->query($query);

			// if ($result) {
			// 	echo $db->affected_rows." author inserted into the database.";
			// } else {
			// 	throw new Exception('Error: The author was not added.');	
			// }

			//Query by Prep Statement

			//insert author to db
			$authorQuery = 'insert into author(name) values (?)';

			$authorStmt = $db->prepare($authorQuery);
			$authorStmt->bind_param("s", $authorName);
			$authorStmt->execute();
			$authorStmt->close();

			//insert book info (title, isbn, image source) to db
			$bookQuery = 'insert into book(title, isbn, image_src) values (?,?,?) ';

			$bookStmt = $db->prepare($bookQuery);
			$bookStmt->bind_param("sss", $bookTitle, $isbn, $bookCover);
			$bookStmt->execute();
			$bookStmt->close();

			$authorIdQuery = 'update book b, author a set b.author_id = a.id where a.name = (?) and b.title = (?)';

			$authorIdStmt = $db->prepare($authorIdQuery);
			$authorIdStmt->bind_param("ss", $authorName, $bookTitle);
			$authorIdStmt->execute();
			$authorIdStmt->close();




			echo '<b>'.$bookTitle.'</b> info added into the database.';

		} catch (Exception $e) {
			echo $e->getMessage();
		}
	?>
</div>
<div class="card-footer">
	<a class="btn btn-secondary" href="book-add.php">Back</a>
</div>
			
<?php
	require_once('view-comp/footer.php');
?>