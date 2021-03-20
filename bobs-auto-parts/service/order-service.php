<?php
	require_once('exception/file-not-found-exception.php');
	define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);

	function saveOrder($tireQty, $oilQty, $sparkQty, $totalAmount){
		echo '<br>'. DOCUMENT_ROOT;

		$date = date('H:i, jS F Y');
		$outputString = $date. "\t" 
		.$tireQty. " tires\t"
		.$oilQty. " oil\t"
		.$sparkQty. " spark plugs\t"
		."$" .$totalAmount. "\n";

		/**
		"r" - Read only. Starts at the beginning of the file
		"r+" - Read/Write. Starts at the beginning of the file
		"w" - Write only. Opens and truncates the file; or creates a new file if it doesn't exist. Place file pointer at the beginning of the file
		"w+" - Read/Write. Opens and truncates the file; or creates a new file if it doesn't exist. Place file pointer at the beginning of the file
		"a" - Write only. Opens and writes to the end of the file or creates a new file if it doesn't exist
		"a+" - Read/Write. Preserves file content by writing to the end of the file
		"x" - Write only. Creates a new file. Returns FALSE and an error if file already exists
		"x+" - Read/Write. Creates a new file. Returns FALSE and an error if file already exists
		"c" - Write only. Opens the file; or creates a new file if it doesn't exist. Place file pointer at the beginning of the file
		"c+" - Read/Write. Opens the file; or creates a new file if it doesn't exist. Place file pointer at the beginning of the file
		“b” - Binary. Use in conjunction with one of the other modes. You might want to use this mode if your file system differentiates between binary and text files. Windows system differentiates; Unix does not. Many would recommend you always use this option for maximum portability.
		“t” - Text. Used in conjunction with one other other modes. This mode is an option only in Windows system, It’s not recommended except before you have ported your code to work with the b option.
		*/

		//fopen(path of file, mode of file)
		//surpress warning to hide pathing from possible attackers if error occurs
		$file = @fopen(DOCUMENT_ROOT .'/dragon-php/bobs-auto-parts/resource/orders.txt', 'ab');

		//checks if file exists or is found
		if(!$file) {
			echo '<p><strong>Your order could not be processed at this time. Please try again later.</strong></p>';
		} else { 
			/**
			LOCK_SH - Reading lock. The file can be shared with other readers.
			LOCK_EX - Writing lock. This operation is exclusive; the file cannot be shared.
			LOCK_UN - The existing lock is released.
			LOCK_NB - Blocking (stopping script execution) is prevented while you are trying to acquire a lock.
			*/
			//flock locks the file in case multiple try to access it (multiple writing can cause problems)
			//flock(file name, mode of lock)
			flock($file, LOCK_EX);
			//fwrite to write onto file
			//fwrite(file, string to add, length of string)
			fwrite($file, $outputString, strlen($outputString));
			flock($file, LOCK_UN);

			fclose($file);
		}
	}

	function getOrders() {
		try {
			//changed name to aorders.txt to test exception
			$file = @fopen(DOCUMENT_ROOT .'/dragon-php/bobs-auto-parts/resource/orders.txt', 'rb');

			if(!$file) {
				throw new FileNotFoundException('No orders pending. Please try again later.', 1);

			} else {
				//feof reads line by line and checks if the end of the file is reached
				//feof(file name)
				while(!feof($file)){
					$order = fgets($file, 999);
					echo $order. '<br>';
				}
			}
			fclose($file);

		} catch(FileNotFoundException $fnfe) {
			//prints the message thrown
			echo $fnfe->getMessage();
			//prints the message thrown with the function added
			echo $fnfe;
		}
	}

	function textToFloatVAT() {
		try {
			//changed name to aorders.txt to test exception
			$file = @fopen(DOCUMENT_ROOT .'/dragon-php/bobs-auto-parts/resource/properties.txt', 'rb');

			if(!$file) {
				throw new FileNotFoundException('VAT cannot be retrieved. Please try again later.', 1);

			} else {
				//feof reads line by line and checks if the end of the file is reached
				//feof(file name)
				while(!feof($file)){
					$vat = fgets($file, 999);
					$vatArray = explode("=", $vat);
					$vatArray[1]+=0; //php has auto-casting, this turns it into a float (0.12)
				}
				return $vatArray[1];
			}
			fclose($file);

		} catch(FileNotFoundException $fnfe) {
			//prints the message thrown
			echo $fnfe->getMessage();
			//prints the message thrown with the function added
			echo $fnfe;
		}
	}
?>