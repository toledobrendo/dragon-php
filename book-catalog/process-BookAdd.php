<?php
	require_once('view-comp/header.php');
?>

<div class="card-header">Add Book Result</div>

<div class="card-body">

	<?php

		$booktitle = $_POST['booktitle'];
		$authorname = $_POST['authorname'];
		$isbn = $_POST['isbn'];
		$imageloc = $_POST['url'];

		try {

			if(!$booktitle || !$authorname || !$isbn || !$imageloc) {
				throw new Exception('Book details not complete. Please try again.');
			}

			$db = new mysqli('127.0.0.1:3306', 'root', '', 'php_lesson_db');

      $dbError = mysqli_connect_errno();
      if ($dbError) {
        throw new Exception('Error: Could not connect to database. Please try again later.');
      }

		    $query = "SELECT id FROM author WHERE name = ?";
				$stmt = $db->prepare($query);
				$stmt->bind_param("s",$authorname);
				$stmt->execute();

				$stmt->store_result();

				$stmt->bind_result($id);
		    if($stmt->num_rows == 0) {
					$query1 = "INSERT INTO author (name) values (?)";
					$stmt = $db->prepare($query1);
					$stmt->bind_param("s", $authorname);
					$stmt->execute();

					$query = "SELECT id FROM author WHERE name = ?";
				  $stmt = $db->prepare($query);
				  $stmt->bind_param("s",$authorname);
				  $stmt->execute();
					$stmt->store_result();
					$stmt->bind_result($id);

			    }

						$stmt->fetch();
							$query2= "INSERT INTO book (title, author_id, isbn, pic_url) values (?, ?, ?, ?)";
							$stmt = $db->prepare($query2);
							$stmt->bind_param("siss", $booktitle, $id, $isbn, $imageloc);
							$stmt->execute();

							if ($stmt->affected_rows > 0) {
								echo $stmt->affected_rows." book was successfully inserted into the database.";
							} else {
								 throw new Exception('Error: The book was not added.');
							}

							$stmt->close();


		}catch (Exception $e) {
			echo $e->getMessage();
		}

	?>

</div>

<?php
require_once('view-comp/Go-Back.php');
require_once('view-comp/footer.php');
?>
