<?php 
	require_once 'view-comp/header.php';
?>
<div class="card-header">Add Book Result</div>
<div class="card-body">
<?php 
	$bookTitle = $_POST['bookTitle'];
	$authorName = $_POST['authorName'];
	$isbn = $_POST['isbn'];
	$bookImage = $_POST['bookImage'];
	if (!$bookTitle || !$authorName || !$isbn || !$bookImage) {
		echo "You have not entered book details. Please click <a href=\"add-book.php\" class=\"btn-link\">here</a> to go back";
	} else {
		@$db = new mysqli('127.0.0.1:3306', 'user', 'jW4gHJ0xLuypbmog', 'php_lesson_db');
		$dbError = mysqli_connect_error();
		if ($dbError){
			echo "Error: Could not connect to database. Please try again later. ".$dbError;
		} else {
			$query = "SELECT * 
			FROM author
			WHERE author.name LIKE '%$authorName%'";
			$result = $db->query($query);
			$resultCount = $result->num_rows;
			if ($resultCount == 0) {
				$query = "INSERT INTO author (name) VALUES (?)";
				$stmt = $db->prepare($query);
				$stmt->bind_param('s', $authorName);
				$stmt->execute();
				$stmt->close();
				$query = "SELECT * 
						FROM author
						WHERE author.name LIKE '%$authorName%'";
				$result = $db->query($query);
				$row = $result->fetch_assoc();
				$authorId = $row['id'];
				echo "$authorId4";
			} else if ($resultCount >= 2) {
				//prompt user to go back
			} else if ($resultCount == 1) {
				$row = $result->fetch_assoc();
				$authorId = $row['id'];
			}
			$query = "SELECT *
					FROM book
					WHERE book.isbn = '$isbn'";
			$result = $db->query($query);
			$resultCount = $result->num_rows;
			if (resultCount >= 1) {
				echo "
				<h6>The Book:</h6>
				<table class=\"table\">
					<tr class=\"row\">
						<td class=\"col-2\">
							<img src=\"".$bookImage."\" width=\"125\" height=\"200\">
						</td>
						<td class=\"col\">
							<br><br>
							<h6>".$bookTitle."</h6>
							<p>".$authorName." ".$isbn."</p>
						</td>
					</tr>
				</table>
				<p>Has already been added to the database</p>
				<p>Click <a href=\"add-book.php\" class=\"btn-link\">here</a> to go back</p>
				";
			} else if (resultCount == 0) {
				$query = "INSERT INTO book (title, author_id, isbn, image) VALUES (?,?,?,?)";
				$stmt = $db->prepare($query);
				$stmt->bind_param("siss", $bookTitle, $authorId, $isbn, $bookImage);
				$stmt->execute();
				$stmt->close();
				echo "
				<h6>The Book:</h6>
				<table class=\"table\">
					<tr class=\"row\">
						<td class=\"col-2\">
							<img src=\"".$bookImage."\" width=\"125\" height=\"200\">
						</td>
						<td class=\"col\">
							<br><br>
							<h6>".$bookTitle."</h6>
							<p>".$authorName." ".$isbn."</p>
						</td>
					</tr>
				</table>
				<p>Has been added to the database</p>
				<p>Click <a href=\"add-book.php\" class=\"btn-link\">here</a> to go back</p>
				";
			}
		}
	}
?>
</div>
<?php 
	require_once 'view-comp/footer.php';
?>