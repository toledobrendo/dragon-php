<?php

	require_once('order-service.php');

	function getVatRate() {

		$file = @ fopen(DOCUMENT_ROOT.'/dragon-php/dragon-php/bobs-auto-parts/resource/properties.txt', 'rn');
		$value_arr = array();
		$counter = 0;

		if(!$file) {
			echo '<p><strong>VAT Amount was not declared. Please try again later.</p></strong>';
		} else{

			while(!feof($file)) {

				// echo fgetc($file);

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