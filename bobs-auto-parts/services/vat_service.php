<?php
	function getVatRate() {

		$file = @ fopen('C:/xampp/htdocs/dragon-php/bobs-auto-parts/properties/properties.txt', 'rn');
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
					$counter++;
				}

			}

		}

		fclose($file);
		return implode($value_arr);
	}

?>