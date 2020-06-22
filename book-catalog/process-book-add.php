<!DOCTYPE html>
<html>
<head>
	<title>Add Book - Result</title>
</head>
<body>

	<?php require_once('view-comp/nav.php'); ?>
	<?php require_once('view-comp/head-links.php'); ?>

	<div class="container">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">Add a Book - Result</h3>

				<?php
					$bookName = $_POST['bookName'];
					$authorName = $_POST['authorName'];
					$isbn = $_POST['isbn'];
					$imgUrl = $_POST['imgUrl'];

					try {
						if(!$bookName || !$authorName || !$isbn || !$imgUrl) {
							throw new Exception('Author details not compete. Please try again.');
						}

						// create connection
						$db = new mysqli('127.0.0.1:3306', 'root', '', 'php_lesson_db');

						$dbError = mysqli_connect_errno();
						if($dbError) {
							throw new Exception('Cannot connect to database. Try again later.');
						}

						//check if author already exists
						$queryCheckAuthor = 
						"
							SELECT * FROM author 
								WHERE name = ?
								LIMIT 1;
						";

						$stmt = $db->prepare($queryCheckAuthor);
						$stmt->bind_param("s", $authorName);
						$stmt->execute();
						$result = $stmt->get_result();

						if($result->num_rows == 0) {
							$queryInsertAuthor = 
							"
								INSERT INTO author(name) 
									VALUES (?);
							";

							$stmt = $db->prepare($queryInsertAuthor);
							$stmt->bind_param("s", $authorName);
							$result = $stmt->execute();

							$authorID = $db->insert_id;
							//echo $authorID . 'new<br>';
						}
						else {
							$row = $result->fetch_assoc();
							$authorID = $row['id'];
							//echo $authorID . 'old<br>';
						}

						$query = 
						'
							INSERT INTO book(title, isbn, img, author_id)
								VALUES (?, ?, ?, ?);
						';

						$stmt = $db->prepare($query);
						$stmt->bind_param("sssi", $bookName, $isbn, $imgUrl, $authorID);
						$stmt->execute();

						$affected_rows = $stmt->affected_rows;
						if($affected_rows > 0) {
							echo 'Book successfully added.<br><br>Title: <strong>' . $bookName . '</strong><br>Author: <strong>' . $authorName . '</strong><br>ISBN: <strong>' . $isbn . '</strong><br>Image: <br>' . '<img src="' . $imgUrl . '">';

						} else {
							throw new Exception('Could not add author.');
						}

					} catch(Exception $e) {
						echo $e->getMessage();
					}
				?>

				<div class="card-footer">
					<a class="btn btn-primary" href="index.php">Back</a>
				</div>

			</div>
		</div>
	</div>

	<?php require_once('view-comp/footer.php'); ?>
	<?php require_once('view-comp/dependencies.php') ?>

</body>
</html>