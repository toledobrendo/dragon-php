<?php
	function logMessage($message) {
		$documentRoot = $_SERVER['DOCUMENT_ROOT'];
		$ipAddress = $_SERVER['REMOTE_ADDR'];
		error_log(date('H:i, jS F Y') .' - '. $ipAddress .' : '. $message.PHP_EOL, 
			3,
			$documentRoot .'/../apache/logs/info.log'); //error_log(output, 3 means external file, location)
	}
?>