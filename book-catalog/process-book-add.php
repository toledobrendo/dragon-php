<?php
	require_once('view-comp/header.php');
?>

<div class="card-header">Add Book Result</div>

<div class="card-body">
	<?php
		$bookTitle = $_POST['bookTitle'];
		$authorName = $_POST['authorName'];
		$isbn = $_POST['isbn'];
		$img_src = $_POST['img_src'];

		try {
			if (!$authorName || !$bookTitle || !$isbn || !$bookCover) {
				throw new Exception('Error: Please fill up every information.');
			}

			@ $db = new mysqli('localhost', 'root', '', 'bookdbs');


			$dbError = mysqli_connect_errno();
			if ($dbError) {
				throw new Exception('Error: Could not connect to database. Try again later!');
			}		


			$authorQuery = 'insert into author(name) values (?)';

			$authorStmt = $db->prepare($authorQuery);
			$authorStmt->bind_param("s", $authorName);
			$authorStmt->execute();
			$authorStmt->close();

			$bookQuery = 'insert into book(title, isbn, image_src) values (?,?,?) ';

			$bookStmt = $db->prepare($bookQuery);
			$bookStmt->bind_param("sss", $bookTitle, $isbn, $img_src);
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