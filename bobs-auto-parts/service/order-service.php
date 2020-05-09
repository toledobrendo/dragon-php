<?php 

// repo directory
define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);

function saveOrder($tireQty, $oilQty, $sparkQty, $totalAmt) {
	// echo '<br/>Your directory root is: '.DOCUMENT_ROOT;

	// open file directory
	$file = @fopen(DOCUMENT_ROOT.'/dragon-php/bobs-auto-parts/resource/orders.txt', 'ab'); // recommended to always use 'b' along with other file modes
	$date = date('H:i, jS F Y');
	$outputString = $date."\t".
		$tireQty."-tires\t".
		$oilQty."-oil\t".
		$sparkQty."-spark plugs\t".
		"$".$totalAmt."\n";

	if(!$file) {
		echo '<p><strong>Your order could not be processed at this time. Please try again later.</strong></p>';
	} else {
		// file lock
		flock($file, LOCK_EX);		
		if(fwrite($file, $outputString, strlen($outputString))) {
			echo '<p>Order list has been updated.</p>';
		} else {
			echo '<p>The order list was not updated.</p>';
		}
		// file unlock
		flock($file, LOCK_UN);
	}

	// close file
	fclose($file);
}

function getOrder() {
	$file = @fopen(DOCUMENT_ROOT.'/dragon-php/bobs-auto-parts/resource/orders.txt', 'rb'); // recommended to always use 'b' along with other file modes

	if(!$file) {
		echo '<p><strong>No orders pending. Please try again later.</strong></p>';
	} else {
		while(!feof($file)) { // eof = end of file
			$order = fgets($file, 999); // 2nd param is the limit that php will read
			echo $order.'<br/>';
		}
	}
}

 ?>