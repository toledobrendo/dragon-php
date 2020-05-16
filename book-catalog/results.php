<?php require_once('view-comp/header.php') ?>
<div class="card-header">
	Book Results
</div>
<div class="card-body">
	
<?php 
	define('FIELDS',array(
		'author' => 'author.name',
		'img_dir' => 'book.img_dir',
		'title' => 'book.title',
		'isbn' => 'book.isbn'
	));
	$searchType = $_POST['searchType'];
	$searchTerm = $_POST['searchTerm'];

	try{
		if(!$searchType || !$searchTerm){
			throw new Exception('Search Details must not be empty.');
		}else{
			@ $db = new mysqli('127.0.0.1:3306','IamJaycee18', '1234567890', 'php_lesson_db');
			$dbError = mysqli_connect_errno();
			if($dbError){
				throw new Exception("DB CONNECTION ERROR");
			}else{
				$selectQuery = 'SELECT author.name as author_name, book.img_dir, book.title,book.isbn 
					FROM book 
					INNER JOIN author
						ON author.id = book.author_id
					WHERE '.FIELDS[$searchType].' LIKE \'%'.$searchTerm.'%\';';

				$result = $db->query($selectQuery);
				$resultCnt = $result->num_rows;

				echo '<p>Result for '.$searchType.' (has): '.$searchTerm.'<br>';
				echo '<Number of Books found: '.$resultCnt.'</p>';

				echo '<div class="row">';
				for($ctr = 0; $ctr < $resultCnt; $ctr++){
					$row = $result->fetch_assoc();
?>
					<div class="card col-4 mx-1">
						<div class="card-body">
							<div class="row">
								<div class="col-6">
									<img width="150px" height="200px" src="<?php echo $row['img_dir']; ?>">
								</div>				
								<div class="col-6">
									<h6><?php echo $row['title']; ?></h6>
									<p>
										By: <?php echo $row['author_name']; ?>
										<br>
										ISBN: <?php echo $row['isbn']; ?>
									</p>
								</div>
							</div>	
						</div>
					</div>
	<?php  
				}
			}
		}
		echo '</div>';
	} catch (Exception $e) {
		echo $e->getMessage();
	}
	?>
	
	<br>
	<a class="btn btn-secondary my-2" href="index.php">BACK</a>
</div>
<?php require_once('view-comp/footer.php'); ?>