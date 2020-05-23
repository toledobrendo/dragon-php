<?php 
	require_once('view-comp/header.php');
	require_once('service/log-service.php');
 ?>

<?php 
	define('FIELDS', array(
	'author' => 'author.name',
	'title' => 'book.title',
	'isbn' => 'book.isbn',
	'img_url' => 'book.img_url'));
 ?>

<div class="card-header">
	Book Results
</div>
<div class="card-body">
	
 	<?php 
 		$searchType = $_POST['searchType'];
 		$searchTerm = $_POST['searchTerm'];

 		try {
 			// no input from form
 			if(!$searchType || !$searchTerm) {
 				throw new Exception('You have not entered search details. Try again.');
 			}

 			// db connection
 			@ $db = new mysqli('127.0.0.1:3306', 'user', '123qwe', 'php_lesson_db');

 			// error checking
 			$dbError = mysqli_connect_errno();
 			if ($dbError) {
 				throw new Exception('Could not connect to database. Try again. Error '.$dbError, 1);
 			}

 			// sql query
 			// returned a non-object error when something was wrong
 			$query = 'SELECT author.name as author_name, book.title, book.isbn, book.img_url
 				FROM book
 				INNER JOIN author
 					ON author.id = book.author_id
 				WHERE '.FIELDS[$searchType].' LIKE \'%'.$searchTerm.'%\';';
 				// LIKE is case insensitive

 			// log (with its own function)
 			logMessage($query);

 			// log (without its own function)
 			// $documentRoot = $_SERVER['DOCUMENT_ROOT'];
 			// error_log($query, 3, $documentRoot.'../../apache/logs/info.txt');

 			// execute
 			$result = $db->query($query);
 			$resultCount = $result->num_rows;

 			echo '<p>Result for '.$searchType.' : '.$searchTerm;
 			echo '<p>Number of books found: '.$resultCount;

 			echo '<div class="row">';
 			for($ctr = 0; $ctr < $resultCount; $ctr++) {
 				// fetch assoc takes the following result for manipulation, then the next, and so on
 				$row = $result->fetchassoc();
 				//echo $row['author_name'].'<br/>';
 	 ?>

	 	<!-- a div each item -->
	 	<div class="card col-4">
	 		<div class="card-body">
	 			<div class="row">
	 				<div class="col">
	 					<img src="<?php echo $row['img_url'];?>" alt="preview" height="150px" width="100px"/>
	 				</div>
	 				<div class="col">
	 					<h6><?php echo $row['title']?></h6>
			 			<p>
			 				By: <?php echo $row['author_name']?>
			 				<?php echo $row['isbn'] ?>
			 			</p>
	 				</div>
	 			</div>	 			
	 		</div>
	 	</div>

 	<?php 
 			}
 			echo '</div>';
 		} catch(Exception $e) {
 			echo $e->getMessage();
 			echo '<br/>';
 		}
 	 ?>
 	 <br/>
 	 <a class="btn btn-secondary my-3" href="index.php">Go Back</a>
</div>

<?php require_once('view-comp/header.php') ?>