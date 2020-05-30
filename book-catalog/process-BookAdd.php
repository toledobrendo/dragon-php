<?php
	require_once('view-comp/header.php');
?>

<div class="card-header">Add Book Result</div>

<div class="card-body">

	<?php

		$booktitle = $_POST['booktitle'];
		$authorname = $_POST['authorname'];
		$isbn = $_POST['isbn'];
		$imageurl = $_POST['imageurl'];

		try {

			if(!$booktitle || !$authorname || !$isbn || !$imageurl) {
				throw new Exception('Book details not complete. Please try again.');
			}

			$db = new mysqli('127.0.0.1:3306', 'root', '', 'php_lesson_db');

      $dbError = mysqli_connect_errno();
      if ($dbError) {
        throw new Exception('Error: Could not connect to database. Please try again later.');
      }

		    $query1 = 'SELECT id FROM author WHERE name = "'.$authorname.'"';
		    $result = $db->query($query1);

		    if($result->num_rows == 0) {

			    $query2 = 'INSERT INTO author (name) values (?)';
			    $authorStmt = $db->prepare($query2);
			    $authorStmt->bind_param("s", $authorname);
			    $authorStmt->execute();

			    if ($authorStmt->affected_rows < 0) {
			      throw new Exception('Error: The author was not added.');
			    }
			    $authorStmt->close();

		    	$query3 = 'SELECT id FROM author WHERE name = "'.$authorname.'"';
		    	$result = $db->query($query3);
			}

			$row = $result->fetch_assoc();

		    $query4 = 'SELECT * FROM book WHERE title = "'.$booktitle.'" ';
		    $result = $db->query($query4);

		    if($result->num_rows == 0) {
				$query5= "INSERT INTO book (title, author_id, isbn, pic_url) values (?, ?, ?, ?)";
				$bookStmt = $db->prepare($query5);
				$bookStmt->bind_param("siss", $bookTitle, $row['id'], $isbn, $imageURL);
				$bookStmt->execute();

				if ($bookStmt->affected_rows > 0) {
					echo $bookStmt->affected_rows." book was successfully inserted into the database.";
				} else {
					 throw new Exception('Error: The book was not added.');
				}

				$bookStmt->close();

			} else {
				throw new Exception('The book you have entered is already in the database. Pls Try Again');
			}

		}catch (Exception $e) {
			echo $e->getMessage();
		}

	?>

</div>

<?php
require_once('view-comp/Go-Back.php');
require_once('view-comp/footer.php');
?>
