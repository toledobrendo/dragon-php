<?php 
	class FileNotFoundException extends Exception{
		function __toString(){
			return '<p><strong>'. $this->getMesage(). '</strong></p>';
		}
	}
?>