<?php
	require_once('view-comp/header.php');

	define('FIELDS', array(
						'author' => 'author.name',
						'title' => 'book.title',
						'isbn' => 'book.isbn'));
?>

<div class="card-header">Book Results</div>

<div class="card-body">

	<div class="row">

	<?php

		$searchType = $_POST['searchType'];
		$searchTerm = $_POST['searchTerm'];

		try {
			
			if(!$searchType || !$searchTerm) {
				throw new Exception('You have not entered search fields. Please go back and try again.');
			} 

			@ $db = new mysqli('127.0.0.1:3306', 'student', 'mydev040100', 'php_lesson_db');

			$dbError = mysqli_connect_errno();

			if($dbError) {
				throw new Exception('Error: Could not connect to database. Please try again later. '.$dbError, 1);
			}

			$query = 'SELECT author.name as author_name, book.title, book.isbn, book.image_src
				FROM book
				INNER JOIN author
				ON author.id = book.author_id
				WHERE '.FIELDS[$searchType].' like \'%'.$searchTerm.'%\';';

			$result = $db->query($query);
			$resultCount = $result->num_rows;


			echo '<p class="mx-3"><i>Result for '.$searchType.' </i>: '.$searchTerm.'</br>';
			echo '<i>Number of books found: </i>'.$resultCount.'</br> </p>';

			echo '</div>';

			echo '<div class="row">';

			for($ctr = 0; $ctr < $resultCount; $ctr++) {
				$row = $result->fetch_assoc();
			
			?>


				<div class="card col-4 mx-2">
					<div class="card-body">
							<div class="row">
								<div class="col-4" style="display: inline-block; padding-right: 15px;">
									<img style="width: 100; height: 150;" src=<?php echo $row['image_src']; ?>>
								</div>

								<div class="col-8" style="display: inline-block; padding-left: 25px;">
									<h6><?php echo $row['title']; ?></h6>
									<p>By: <?php echo $row['author_name']; ?><br/>
										<?php echo $row['isbn']?>
									</p>
								</div>
						</div>
					</div>
				</div>

			<?php

			}

			echo '</div>';

		} catch (Exception $e) {
			echo $e->getMessage();
			
		}
		?>

		</div>
		<div class="mx-3">
			<a class="btn btn-secondary my-3" href="index.php"> Go Back </a>
		</div>
</div>
</div>

<?php
	require_once('view-comp/footer.php');
?>