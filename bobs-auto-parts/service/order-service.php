<?php
	require_once('../exception/file-not-found-exception.php');
?>

<?php 
	define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);

	function saveOrder($tireQty, $oilQty, $sparkQty, $totalAmount){
		//echo '<br/>'. DOCUMENT_ROOT;

		$date = date('H:i, jS F Y');

		$outputString =  $date."\t"
			.$tireQty." tires\t"
			.$oilQty." oil\t"
			.$sparkQty." spark plugs\t"
			.'$'.$totalAmount."\n";

		//opening file
		$file = @ fopen(DOCUMENT_ROOT.'/dragon-php/bobs-auto-parts/resource/orders.txt', 'ab');

		//check if file is opened successfully
		if (!$file){
			echo '<p><strong>Your order could not be processed at this time. Please try again later.</strong></p>';
		} else {
			flock($file, LOCK_EX);
			//writing
			fwrite($file, $outputString, strlen($outputString));
			flock($file, LOCK_UN);
			fclose($file);
		}
	}

	function getOrders(){

		try{
			$file = @ fopen(DOCUMENT_ROOT.'/dragon-php/bobs-auto-parts/resource/orders.txt', 'rb');

			if (!$file) {
				throw new FileNotFoundException('No orders pending.', 1);
			} else {
			//reading line by line
				while(!feof($file)){
					$order = fgets($file,999);
					echo $order.'<br/>';
				};

				fclose($file);
			}

		} catch(FileNotFoundException $e){
			echo $e->getMessage();
			echo $e;
		}
	}
?>