<?php
	require_once('view-comp/header.php');
	require_once('service/log-service.php');
?>

<div class="card-header">Results</div>

<div class="card-body">
	<?php
		define('FIELDS', array(
			'author' => 'author.name',
			'title' => 'book.title',
			'isbn' => 'book.isbn'
		)); //=> changes the string if equal
		$searchType = $_POST['searchType'];
		$searchTerm = $_POST['searchTerm'];

		try{
			if(!$searchType || !$searchTerm){ //checks if there is any data inside
				throw new Exception('You have not entered any search details. Please go back and try again.');
			}

			@ $db = new mysqli('127.0.0.1:3306', 'user', '123qwe', 'php_lesson_db');

			$dbError = mysqli_connect_errno(); 

			if($dbError){ //checks if there was a connection error
				throw new Exception('Error: could not connect to database. Please try again later. '. $dbError, 1);
			}
			
			$query = 'SELECT author.name AS author_name, book.pic_url, book.title, book.isbn
				FROM book
				INNER JOIN author
					ON author.id = book.author_id
				WHERE '. FIELDS[$searchType] .' LIKE \'%'. $searchTerm .'%\';';

			logMessage($query);

			$result = $db->query($query); //executes the query

			$resultCount = $result->num_rows; //counts the number of rows selected from the query

			echo '<p>Result for '. $searchType .' : '. $searchTerm .'<br>';
			echo 'Number of books found: '. $resultCount .'</p>';
			echo '<div class="row">';
			for($ctr = 0; $ctr < $resultCount; $ctr++) { //loops through the data
				$row = $result->fetch_assoc(); //retrieves one row of data and converts the row data to corresponding data types
				// echo $row['author_name'] .'<br>';
	?>

				<div class="card col-4 mx-1">
					<div class="card-body">
						<img class="book-img" src="<?php echo $row['pic_url'];?>">
						<h6><?php echo $row['title'];?></h6>
						<p>By: <?php echo $row['author_name'];?><br>
							<?php echo $row['isbn'];?>
						</p>
					</div>
				</div>
	<?php
			}
			echo '</div>';
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	?>
	<a href="index.php" class="btn btn-secondary my-3">Go Back</a>
</div>

<?php
	require_once('view-comp/footer.php');
?>