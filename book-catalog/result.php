<?php 
	require_once 'view-comp/header.php';
	require_once 'service/log-service.php';
?>
<div class="card-header">Book Search Result</div>
<div class="card-body">
	<?php 
		define('FIELDS', array(
			'author' => 'author.name',
			'title' => 'book.title',
			'isbn' => 'book.isbn',
			'image' => 'book.image'));
		$searchType = $_POST['searchType'];
		$searchTerm = $_POST['searchTerm'];
		if (!$searchTerm || !$searchType) {
			echo "You have not entered search details. Please click <a href=\"index.php\" class=\"btn-link\">here</a> to go back";
		} else {
			@$db = new mysqli('127.0.0.1:3306', 'user', 'jW4gHJ0xLuypbmog', 'php_lesson_db');
			$dbError = mysqli_connect_error();
			if ($dbError){
				echo "Error: Could not connect to database. Please try again later. ".$dbError;
			} else {
				$query = "SELECT author.name AS author_name, book.title, book.isbn, book.image".
				" FROM book".
				" INNER JOIN author".
				" ON book.author_id = author.id".
				" WHERE ".FIELDS[$searchType]." LIKE '%$searchTerm%';";
				$documentRoot = $_SERVER['DOCUMENT_ROOT'];
				logMessage($query);
				$result = $db->query($query);
				$resultCount = $result->num_rows;

				echo "
					<p>Result for $searchType: $searchTerm</p>
					<p>Number of books found: $resultCount</p>
					<table class=\"table\">
				";
				for ($ctr = 0; $ctr < $resultCount; $ctr++) { 
					$row = $result -> fetch_assoc();
					echo "
						<tr class=\"row\">
							<td class=\"col-2\">
								<img src=\"".$row['image']."\" width=\"125\" height=\"200\">
							</td>
							<td class=\"col\">
								<br><br>
								<h6>".$row['title']."</h6>
								<p>".$row['author_name']." ".$row['isbn']."</p>
							</td>
						</tr>
					";
				}
				echo "</table>";
			}
		}
	?>
</div>
<?php 
	require_once 'view-comp/footer.php';
?>