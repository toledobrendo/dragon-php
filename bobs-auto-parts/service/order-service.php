<?php
	define('DOCUMENT_ROOT', $_Server['DOCUMENT_ROOT']);

	function saveOrder($tireQty,$oilQty,$sparkQty, $totalAmount){
		echo '<br/>' DOCUMENT_ROOT;



		$date = data('H:i,jS F Y');

		$outputString = $data."\t"
			.$tireQty.'tires\t'
			.$oilQty.'oil\t'
			.$sparkQty.'spark plug\t'
			.'$'.$totalAmount. '\n';



		$file = @ fopen(DOCUMENT_ROOT. '/dragon-php/bobs-auto-parts/resource/orders.txt','ab');

		if(!file){
			echo '<p><strong>Your order could not be processed at this time.
			Please try again later.</strong></p>';
		} else {
			fwrite($file,$outputString,strlen($outputString));
			fclose($file);
		}



	}

?>