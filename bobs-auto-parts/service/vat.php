<?php

  require_once('order-service.php');

  function getVat() {
    $file = @ fopen(DOCUMENT_ROOT.'/dragon-php/bobs-auto-parts/resource/properties.txt', 'rn');

  $value = array();
	$index = 0;

		if(!$file) {
			echo '<p><strong>Vat amount was not on the file...Please try again.</p></strong>';
		} else{

			while(!feof($file)) {

				// echo fgetc($file);

				$var = fgetc($file);

				if(is_numeric($var) == 1  || $var == ".") {
					$value[$index] = $var;
					// echo $var;
					$index++;
				}

			}

		}

		fclose($file);
		return implode($value);
	}


?>
