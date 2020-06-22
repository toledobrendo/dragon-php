<?php
	define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);

	function saveOrder($tireQty, $oilQty, $spkplgQty, $totalAmount) {
		//echo "<br> " . DOCUMENT_ROOT;

		$date = date('H:i, jS F Y');

		$outputString = $date . "\t" 
		. $tireQty . " tires\t" 
		. $oilQty  . " oils\t" 
		. $spkplgQty . "spark plugs\t"
		. "$" . $totalAmount . "\n";

		$file = fopen(DOCUMENT_ROOT . '/dragon-php/bobs-autoparts/resource/orders.txt', 'ab');

		if(!$file) {
			echo "cannot open file";
		} else {
			@ flock($file, 'LOCK_EX');
			fwrite($file, $outputString, strlen($outputString));
			@ flock($file, 'LOCK_UN');

			fclose($file);
		}
	}

	function getOrders() {
		$file = @ fopen(DOCUMENT_ROOT . '/dragon-php/bobs-autoparts/resource/orders.txt', 'rb');

		if(!$file) {

		} else {
			while (!feof($file)) {
				$order = fgets($file, 999);
				echo $order . "<br>";
			}
		}
	}
?>