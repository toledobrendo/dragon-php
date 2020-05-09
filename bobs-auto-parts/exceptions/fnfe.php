<?php 
	class FileNotFoundException extends Exception {
		function __toString(){
			return '<p><b>'.$this->getMessage().'</b></p>';
		}
	}
?>