<?php require_once('view-comp/header.php');?>
<div class="card-header">
 Add author result
</div>

<div class="card-body">
 	<?php
 		$authorName = $_POST['authorName'];

 		try{
 			if(!$authorName){
 			throw new Exception('Author details not complete, please try again');
 			
 			}

 			@ $db = new mysqli('127.0.0.1:3306', 'student', '123qwe', 'php_lesson_db');

 			$dbError = mysqli_connect_error();
 			if($dbError){
 				throw new Exception('Error: could not connect to database');
 			}



 			//Query by qury string concatenation
 			// if(getAuthorCount($db,$authorName)){

 			// }

 			// $query = 'insert into author(name) values(\''.$authorName.'\')';
 			// $result = $db->query($query);

 			// if($result){
 			// 	echo $db->affected_rows." author inserted into the database.";
 			// }else{
 			// 	throw new Exception('Error: The author was not added. :c');
 			// }
 			$query = 'insert into author(name) values(?)';
 			$stmt = $db->prepare($query);
 			$stmt->bind_param("s",$authorName);
 			$stmt->execute();

 			$affectedRows =  $stmt->affected_rows;
 			if($affectedRows>0){
 				echo $affectedRows."author inserted into the database.";
 			}else
 			throw new Exception ('author inserted into the database.');

 			$stmt->close();

 		} catch (Exception $e){
 			error_log($e->getMessage());
 			echo $e->getMessage();
 		}


 		
 	?>

 </div>
	 <div class ="card-footer">
	 	<a class="btn btn-secondary" href = "author-add.php">Back</a>
	 </div>
 <?php require_once('view-comp/footer.php') ?>