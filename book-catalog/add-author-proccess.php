<?php 
	require_once 'view-comp/header.php';
?>
<div class="card-header">Add Author Result</div>
<div class="card-body">
<?php 
	$bookTitle = $_POST['bookTitle'];
	$authorName = $_POST['authorName'];
	$isbn = $_POST['isbn'];
	$bookImage = $_POST['bookImage'];
	if (!$bookTitle || !$authorName || !$isbn || !$bookImage) {
		echo "You have not entered author details. Please click <a href=\"add-author.php\" class=\"btn-link\">here</a> to go back";
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
				echo "
					<h6>The Author:</h6>
					<p>$authorName</p>
					<p>Has been added to the database</p>
					<p>Click <a href=\"add-book.php\" class=\"btn-link\">here</a> to go back</p>
				";
			} else if ($resultCount >= 1) {
				echo "
					<h6>The Author:</h6>
					<p>$authorName</p>
					<p>Is already been added to the database</p>
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