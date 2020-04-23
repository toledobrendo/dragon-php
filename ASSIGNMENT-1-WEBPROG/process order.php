<!DOCTYPE html>
<?php
	define ('TIRE_PRICE', 100);
	define ('OIL_PRICE', 50);
	define ('SPARK_PRICE', 30);
?>
<html>
<head>
	<title>
		Process Order
	</title>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">
					Order Results
				</h3>
				<?php
					echo '<p> Order Processed at ';
					echo date('H:i, jS F Y');
					echo '</p>';

					$tireQty = $_POST['tireQty'] ? $_POST['tireQty'] : 0;
            		$oilQty = $_POST['oilQty'] ? $_POST['oilQty'] : 0;
            		$sparkQty = $_POST['sparkQty'] ? $_POST['sparkQty'] : 0;

					echo '<p> Your Order is as follows </p>';

					echo "$tireQty tires </br>";
					echo "$oilQty oils </br>";
					echo "$sparkQty spark </br>";

					echo '<p> Prices are: </p>';

					echo 'Tires: ' .TIRE_PRICE. '</br>';
					echo 'Oil: ' .OIL_PRICE. '</br>';
					echo 'Spark Plug: ' .SPARK_PRICE. '</br></br>';

					$totalQty = @($tireQty + $oilQty + $sparkQty);
					echo 'Total Quantity: ' .$totalQty. '</br></br>';

					$tireAmount = $tireQty * TIRE_PRICE;
					$oilAmount = $oilQty * OIL_PRICE;
					$sparkAmount = $sparkQty * SPARK_PRICE;

					$totalAmount = (float) $tireAmount;

					$otherTotalAmount = &$totalAmount;
					$otherTotalAmount += $oilAmount;
					$totalAmount += $sparkAmount;

					$vatAmount = $totalAmount * 0.12;
					$vatableAmount = $totalAmount - $vatAmount;

					echo 'Other Total Amount: ' .$otherTotalAmount. '</br>';
					echo 'VAT Amount: ' .$vatAmount. '</br>';
					echo 'VATABLE Amount: ' .$vatableAmount. '</br>';
					echo 'Total Amount: ' .$totalAmount. '</br>';

					echo 'Amount exceeded 500?' .($totalAmount > 500 ? 'Yes' : 'No'). '</br>';

					
				?>
			</div>
			<div class="card-footer">
				<a class="btn btn-info" href="order form.php">Go Back</a>
			</div>
		</div>
	</div>
</body>


</html> 