<?php

	require_once('order-service.php');

	function getVatRate() {

		$file = @ fopen(DOCUMENT_ROOT.'/dragon-php/assignments/vat-percent/resource/properties.txt', 'rb');
		$value_arr = array();
		$counter = 0;

		if(!$file) {
			echo '<strong>VAT Amount was not shown. Please try again later.</strong>';
		} else{

			while(!feof($file)) {

				$var = fgetc($file);

				if(!ctype_alpha($var) && $var != '_'  && $var != '=' && $var != ' ') {
					$value_arr[$counter] = $var;
					echo $var;
					$counter++;
				}

			}

		}

		fclose($file);
		return implode($value_arr);
	}

?>
