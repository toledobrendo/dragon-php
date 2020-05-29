<?php 
	require_once("service/log-service.php");
	require_once("view-comp/header.php");
?>

<div class="card-header">Book Results</div>

<div class="card-body">
		<?php 
		define('FIELDS', array(
			'author' => 'author.name',
			'title' => 'book.title',
			'isbn' => 'book.isbn'
		));


		$searchType = $_POST['searchType'];
		$searchTerm = $_POST['searchTerm'];

		try{
			if(!$searchType || !$searchTerm){
				throw new Exception('You have not entered search details. Please go back and try again.', 1);
			}

			@ $db = new mysqli ('localhost', 'user','pass','php_lesson_db');

			$dbError = mysqli_connect_errno();
			if ($dbError) {
				throw new Exception('Error: Could not connect to database.'. $dbError, 1);
			}
			
			$query = 'SELECT author.name as author_name, book.title, book.isbn, book.pic_url 
				FROM book 
				INNER JOIN author 
					ON author.id = book.author_id 
					WHERE '. FIELDS[$searchType] .' LIKE \'%'.$searchTerm.'%\';';
 
			// echo $query;
			logMessage($query);

			$result = $db->query($query);

			$resultCount = $result->num_rows;

			echo '<p>Result for '. $searchType.': '. $searchTerm. '<br/>';
			echo '<p>Number of book/s found: '. $resultCount;

			echo '<div class="row">';

			for($ctr = 0; $ctr < $resultCount; $ctr++){
				$row = $result -> fetch_assoc(); 
				
				?>
				<div class="card col-4 mx-1">
					<div class="card-body">
						<h6><?php echo $row['title']?></h6>
						<p>
						<img src="<?php echo $row['pic_url']?>" width="125" height="200">
							By: <?php echo $row['author_name']?> <br>
							<?php echo $row['isbn']?>
						</p>
					</div>
				</div>
				<?php
			}	
			echo '</div>';
		} catch (Exception $e){
			echo $e->getMessage();
		}
		?>
	<br/>

	<a class="btn btn-secondary my-3" href="index.php">Go Back</a>

<?php 
	require_once("view-comp/footer.php");
?>

