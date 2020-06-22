<?php
	@$key = $_GET['key'];
	if(empty($key)) {
		$key = 0;
	}

	@$dataText = $_GET['dataText'];
	if(empty($dataText)) {
		$dataText = '';
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>H2 - Ceasar Cipher</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<style type="text/css">
		.container {
			margin-top: 20px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">Ceasar Cipher</h3>

				<form class="" action="ceasar.php" method="GET">
					<div class="form-group form-row align-items-center">
						<div class="col-auto">
							<label class="form-check-label">Text: </label>
						</div>

						<div class="col">
							<input class="form-control" type="textarea" name="dataText" <?php echo !empty($dataText) ? 'value="' . $dataText . '"' : '';?>>
						</div>
					</div>


					<div class="form-group form-row align-items-center">
						<div class="col-auto">
							<label class="form-check-label">Key: </label>
						</div>

						<div class="col-auto">
							<input class="form-control"  type="number" name="key" <?php echo !empty($key) ? 'value="' . $key . '"' : '';?>>
						</div>
					</div>

					
					<button class="btn btn-primary" type="submit">Encrypt</button>
					

				</form>

				<?php 
					
					 $dataTextArr = str_split($dataText);
					 foreach($dataTextArr as $textChar) {
					 	$textChar = strtoupper($textChar);
					 	$asciiVal = ord($textChar);

					 	// prints non-alpha characters as-is
					 	if(!($asciiVal-64 >= 1 && $asciiVal-64 <= 26)) {
					 		echo $textChar;
					 	}
					 	else {
					 		// transforms negative keys to 
					 		$shift = $key < 0 ? abs($key)+26 : $key;

					 		// scales the key so that it won't exceed 26
						 	if($shift > 26) {
						 		$shift = $key - (floor($key / 26) * 26);
						 	}
						 	
						 	// if exceeded Z, remap to A
						 	$excess = 0;
						 	if( ($asciiVal-64 + $shift) > 26) {
						 		$excess = ($asciiVal-64 + $shift) - 26 - 1;

						 		$textChar = 'A';
						 		$shift = $excess;
						 	}
						 	for($i = 0; $i < $shift; $i++) {
					 			$textChar++;
					 		}
					 		echo $textChar;
					 	}
					 	
					 }		
				 ?>

			</div>
		</div>
	</div>
	
</body>
</html>