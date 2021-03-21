<?php
	require_once('log-service.php');

	function getAuthorCount($db, $authorName) {
		$queryString = 'SELECT COUNT(name) AS author_count FROM author WHERE name LIKE \'%'. $authorName .'%\'';
		logMessage($queryString);
		$result = $db->query($queryString);
		$resultCount = $result->fetch_assoc(); //converts the row data to corresponding data types
		return $resultCount['author_count'];
	}

	function addAuthor($db, $authorName) {
		$queryString = 'INSERT INTO author (name) VALUES (?)';
		logMessage($queryString);
		$stmt = $db->prepare($queryString);
		//s meaning String
		$stmt->bind_param('s', $authorName);
		$stmt->execute();

		$affectedRows = $stmt->affected_rows;

		if($affectedRows > 0){
			echo $affectedRows ." author inserted into database. <br>";
		} else {
			throw new Exception("Error: The author was not added");
		}

		$stmt->close();
	}
?>