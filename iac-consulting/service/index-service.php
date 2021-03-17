<?php
	//passing by reference to change the actual data
	function raiseToTwo(&$base){
		$base *= $base;
	}
?>