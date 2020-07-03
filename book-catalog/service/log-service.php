<?php 
	function logMessage($message){
		$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
		$ipAddress = $_SERVER['REMOTE_ADDR'];
		error_log(date('H:i, jS F Y').": by ".$ipAddress.$message.PHP_EOL, 3, $DOCUMENT_ROOT.'/../apache/logs/info.log');
	}
?>