<?php
	require_once('exception/file-not-found-exception.php');
?>

<?php 
	function getVat(){

		try{
			$file = @ fopen(DOCUMENT_ROOT.'/dragon-php/bobs-auto-parts/resource/properties.txt', 'rb');

			if (!$file) {
				throw new FileNotFoundException('<font color=red><strong>Vat File does not exist.</strong></font><br/>', 1);
			} else {
				while(!feof($file)){
					$percent = fgets($file, 999);
					$percentValue = explode("=", $percent);
					define('VAT_PERCENT', (float) $percentValue[1]);
				};

				fclose($file);
			}
		} catch(FileNotFoundException $e){
			echo $e->getMessage();
		}		
	}
?>

