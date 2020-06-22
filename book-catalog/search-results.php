<?php
	require_once('service/log-service.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Results</title>
</head>
<body>

	<?php require_once('view-comp/nav.php') ?>
	<?php require_once('view-comp/head-links.php'); ?>

	<div class="container">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">Book Results for "<?php if(!empty($_POST['searchTerm'])) echo $_POST['searchTerm']; ?>"</h3>

				<?php
					$searchType = $_POST['searchType'];
					$searchTerm = $_POST['searchTerm'];

					try {
						if(!isset($searchType) || !isset($searchTerm)) {
							throw new Exception("Variables not set", 1);
						}

						$db = new mysqli('127.0.0.1:3306', 'root', '', 'php_lesson_db');

						$dbError = mysqli_connect_errno();
						if($dbError) {
							throw new Exception('Cannot connect to database. Try again later.');
						}

						$query = 
						'
							SELECT author.name as author_name, book.title, book.isbn, book.img
								FROM book
								INNER JOIN author
									ON author.id = book.author_id
								WHERE ' . $searchType . ' LIKE ' . "'%" . $searchTerm . "%'" . ";";
						
						//echo $query;
						$documentRoot = $_SERVER['DOCUMENT_ROOT'];
						logMessage($query);

						$result = $db->query($query);
						$resultCount = $result->num_rows;
						
						for($ctr = 0; $ctr < $resultCount; $ctr++) {
							$row = $result -> fetch_assoc();

						?>
							<div class="card col-4">
								<div class="row no-gutters">
									<div class="col-md-4">
										<img src=" <?php echo $row['img']; ?> " class="card-img" alt="..." style="min-height: 160px;">
									</div>

									<div class="col-md-8">
										<div class="card-body">
											<h6><?php echo $row['title'];?></h6>
											<p>
												By: <?php echo $row['author_name']; ?>
												<br>
												<?php echo $row['isbn']; ?>
											</p>
										</div>
									</div>
								</div>

								
							</div>
						<?php
						}

					} catch(Exception $e) {
						$e.getMessage();
					}

				?>

				<br>
				<a class="btn btn-secondary" href="index.php">Go Back</a>
			</div>
		</div>
	</div>

	<?php require_once('view-comp/footer.php'); ?>
	<?php require_once('view-comp/dependencies.php') ?>

</body>
</html>