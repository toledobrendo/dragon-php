<?php 
	require_once('exceptions/fnfe.php');
	define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);

	function saveOrder($boughtList,$total){

		$outFile = date('H:i, jS F Y').', '."\t";
		$printFile = date('H:i, jS F Y').', '."\t".$total.'.00, '."\t";

		$fileLoc = @ fopen(DOCUMENT_ROOT.'/dragon-php/bobs-auto-parts/res/orders.txt', 'ab');

		if(!$fileLoc){
			echo '<p><b>Sorry for the inconvinience. We are currently under maintainance.</b></p>';
		}else{
			//success
			$ctr=1;
			foreach ($boughtList->products as $item) {	
				if($ctr!=3){
					$printFile .= $_POST[$item->productID.'QTY']."\t".$item->productName.'(s), '."\t";
				}else{
					$printFile .= $_POST[$item->productID.'QTY']."\t".$item->productName.'(s). '."\t";
				}	
				$ctr++;	
            }


            $printFile .= "\n";

            flock($fileLoc, LOCK_EX);
            fwrite($fileLoc, $printFile, strlen($printFile));
            flock($fileLoc, LOCK_UN);

            fclose($fileLoc);
		}
	}

	function getOrders(){
		$fileLoc =  @ fopen(DOCUMENT_ROOT.'/dragon-php/bobs-auto-parts/res/orders.txt', 'rb');
		try{
			if(!$fileLoc){
				throw new FileNotFoundException('Sorry for the inconvinience. We are currently under maintainance.');
			}else{
				while(!feof($fileLoc)){
					$order = fgets($fileLoc, 999);
					echo $order.'<br>';
				};
				fclose($fileLoc);
			}
		}catch (FileNotFoundException $fnfe){
			//echo $fnfe->getMessage();
			echo $fnfe;
		}
		
	}
?>