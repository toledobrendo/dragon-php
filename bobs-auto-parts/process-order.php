<?php
	define('TIRE_PRICE', 100);
	define('OIL_PRICE', 50);
	define('SPARK_PRICE', 30);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">Order Results</h3>
				<?php 
					echo '<p>Order Processed at ';
					echo date('H:i, jS F Y');
					echo '</p>';

					//PHP Comments
					/** Multiline comments
						Wow**/

					//declaring the variables
					// gets the data from the form submitted
					//@ suppresses warning, making them not seen
					$tireQty = $_POST['tireQty'] ? $_POST['tireQty'] : 0;
					$oilQty = $_POST['oilQty'] ? $_POST['oilQty'] : 0;
					$sparkQty = $_POST['sparkQty'] ? $_POST['sparkQty'] : 0;
					$totalQty = @($tireQty + $oilQty + $sparkQty);

					$find = $_POST['find'];

					switch ($find) {
						case 'regular':
							echo 'Regular Customer';
							break;

						case 'tv':
							echo 'From TV Advertising';
							break;

						case 'phone':
							echo 'From Phone Directory';
							break;

						case 'mouth':
							echo 'From word of mouth';
							break;
						
						default:
							echo 'Unknown Customer';
							break;
					}

					echo '<p>Prices<br/>';
					echo 'Tires: '.TIRE_PRICE.'<br/>';
					echo 'Oil: '.OIL_PRICE.'<br/>';
					echo 'Sparks Plugs: '.SPARK_PRICE.'<br/><br/>';

					if($totalQty == 0){
						echo 'You did not order anything! <br/><br/>';
					} else {
						echo '<p>Your order is as follows</p>';
						if($tireQty > 0)
							echo "$tireQty tires<br/>";
						if($oilQty > 0)
							echo "$oilQty oil<br/>";
						if($sparkQty > 0)
							echo "$sparkQty spark plugs<br/>";
						//different way of display
						//echo $tireQty.' $tireQty tires<br/>';
					}

					$tireAmount = @($tireQty * TIRE_PRICE);
					$oilAmount = @($oilQty * OIL_PRICE);
					$sparkAmount = @($sparkQty * SPARK_PRICE);
					$totalAmount = @((float) ($tireAmount + $oilAmount + $sparkAmount));
					$otherTotalAmount = &$totalAmount;
					$otherTotalAmount += $oilAmount;

					$vatableAmount = @((float)($totalAmount / 1.12));
					$vatAmount = @((float)($vatableAmount * 0.12));
					
					echo 'Total Quantity: '.$totalQty.'<br/>';
					echo 'VATABLE Amount: '.$vatableAmount.'<br/>';
					echo 'VAT Amount(12%): '.$vatAmount.'<br/>';
					echo 'Total Amount: '.$totalAmount.'<br/>';
					echo 'Other Total Amount: '.$otherTotalAmount.'<br/>';
					echo 'Amount Exceeded 500 but less than 1000? '.($totalAmount > 500 && $totalAmount < 1000 ? 'Yes' : 'No').'<br/><br/>';

					echo 'Is $totalAmount String? '.(is_string($totalAmount) ? 'Yes' : 'No').'<br/>';

					unset($totalAmount);
					//checks if the variable has a value set to it
					echo 'Is $totalAmount set? '.(isset($totalAmount) ? 'Yes' : 'No').'<br/>';

					$totalAmountTwo = "";
					echo 'Is $totalAmountTwo set? '.(isset($totalAmountTwo) ? 'Yes' : 'No').'<br/>';
					//if 0 or "" it will show 'Yes'
					echo 'Is $totalAmountTwo empty? '.(empty($totalAmountTwo) ? 'Yes' : 'No').'<br/>';
				?>
				<div class="card-footer">
					<a class="btn btn-info float-right" href="order-form.php">Go Back</a>
				</div>	
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>