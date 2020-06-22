<!DOCTYPE html>
<html>
<head>
	<title>Add Author - Result</title>
</head>
<body>

	<?php require_once('view-comp/nav.php'); ?>
	<?php require_once('view-comp/head-links.php'); ?>

	<div class="container">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">Add an Author - Result</h3>

				<?php
					$authorName = $_POST['authorName'];

					try {
						if(!$authorName) {
							throw new Exception('Author details not compete. Please try again.');
						}

						$db = new mysqli('127.0.0.1:3306', 'root', '', 'php_lesson_db');

						$dbError = mysqli_connect_errno();
						if($dbError) {
							throw new Exception('Cannot connect to database. Try again later.');
						}

						// $query = 
						// '
						// INSERT INTO author(name)
						// 	VALUES (values here);
						// ';
						
						//echo $query;

						// $result = $db->query($query);

						// if($result) {
						// 	echo $db->affected_rows . ' author successfully added.';
						// } else {
						// 	throw new Exception('Could not add author.');
						// }

						$query = 
						'
						INSERT INTO author(name)
							VALUES (?);
						';

						$stmt = $db->prepare($query);
						$stmt->bind_param("s", $authorName);
						$stmt->execute();


						$affected_rows = $stmt->affected_rows;
						if($affected_rows > 0) {
							echo $affected_rows . ' author successfully added.';
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