<!DOCTYPE html>
<?php
	define('TIRE_PRICE', 100);
	define('OIL_PRICE', 50);
	define('SPARK_PRICE', 30);
?>

<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>
<body>
	<div class="container">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">Order Result</h3>
				<?php
					echo '<p>Order Processed at ';
					echo date('H:i, jS F Y');
					echo '</p>';

					/**
						Uy nice!
						Pruuuuu	
					**/

					$tireQty = $_POST['tireQty'] ? $_POST['tireQty'] : 0;
					$oilQty = $_POST['oilQty'] ? $_POST['oilQty'] : 0;
					$sparkQty = $_POST['sparkQty'] ? $_POST['sparkQty'] : 0;

					echo '<p>Your order is as follows</p>';
					echo $tireQty.' tire/s<br/>';
					echo $oilQty.' bottle/s of oil<br/>';
					echo $sparkQty.' spark plug/s<br/><br/>';

					/**
					echo '<p>Prices<br/>';
					echo 'Tires: '.TIRE_PRICE.'<br/>';
					echo 'Oil: '.OIL_PRICE.'<br/>';
					echo 'Spark Plug: '.SPARK_PRICE.'<br/><br/>';

					$totalQty = @($tireQty + $oilQty + $sparkQty);
					echo 'Total Quantity: '.$totalQty.'<br/>';
					**/

					$tireAmount = @($tireQty * TIRE_PRICE);
					$oilAmount = @($oilQty * OIL_PRICE);
					$sparkAmount = @($sparkQty * SPARK_PRICE);

					$totalAmount = (float) ($tireAmount + $oilAmount + $sparkAmount);
					echo 'Total Amount: ' .$totalAmount.'<br/>';

					$vat = (float) (0.12 * $totalAmount);
					echo "VAT Amount: " .$vat.'<br/>';

					$vatableAmount = (float) ($totalAmount - $vat);
					echo "VATable Amount: " .$vatableAmount.'<br/><br/>';

					echo 'Amount Exceeded 500 but less than 1000?'.($totalAmount > 500 && $totalAmount < 1000 ? ' Yes' : ' No').'<br/>';
				?>
			</div>
			<div class="card-footer">
				<a class="btn btn-info" href="order-form.php">Go Back</a>
			</div>
		</div>
	</div>
</body>
</html>