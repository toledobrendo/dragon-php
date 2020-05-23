<?php
	function logMessage($message){
		$documentRoot = $_SERVER['DOCUMENT_ROOT'];
		error_log(date('H:i, js F Y').' : ' .$message.PHP_EOL,3,$documentRoot.'/../apache/logs/info.log');
	}
?>