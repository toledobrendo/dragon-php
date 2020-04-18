<!DOCTYPE html>
<?php 
	// constant variables
	define('TIRE_PRICE', 100);
	define('OIL_PRICE', 50);
	define('SPARK_PRICE', 30);
 ?>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container">
			<div class="card">
				<div class="card-body">
					<h2 class="card-title">Bob's Auto Parts</h2>
					<h3 class="card-title">Order Result</h3>
					<?php 
						echo '<p>Order Processed at ';
						echo date('H:i, jS F Y');
						echo '</p>';

						$tireQty = $_POST['tireQty'];
						$oilQty = $_POST['oilQty'];
						$sparkQty = $_POST['sparkQty'];

						echo '<p>Order List:</p>';
						// single quote: variables must be outside
						echo $tireQty.' tires<br/>';
						// double quote: variables can be inside
						echo "$oilQty bottles of oil<br/>";
						echo "$sparkQty spark plugs<br/>";

						echo '<br/><b><p>Prices:</b>';
						echo '<br/>Tires: '.TIRE_PRICE;
						echo '<br/>Oil: '.OIL_PRICE;
						echo '<br/>Spark Plug: '.SPARK_PRICE;

						// NOTE: arithmetic operations expect a numerical value, but php attempts to do the operation regardless (expect a warning message in your webpage though)

						// to hide warnings, do @(operationHere)

						// quantity
						$totalQty = $tireQty + $oilQty + $sparkQty;
						echo '<br/><br/><b>Total Quantity</b>: '.$totalQty;

						// prices
						$tireAmt = TIRE_PRICE * $tireQty;
						$oilAmt = OIL_PRICE * $oilQty;
						$sparkAmt = SPARK_PRICE * $sparkQty;

						// summary
						echo '<br/><b><p>Summary:</b>';
						$totalPrice = $tireAmt + $oilAmt + $sparkAmt;

						// VAT
						$VATamt = 0.12 * $totalPrice;
						$VATableAmt = $totalPrice - $VATamt;

						echo '<br/>VATable Amount: '.$VATableAmt;
						echo '<br/>VAT Amount: '.$VATamt;

						echo '<br/><br/><b>Total amount</b>: '.$totalPrice;

						// ternary operation
						echo '<br/><br/>Amount Exceeded 500? but less than 1000? '.(($totalPrice > 500 && $totalPrice < 1000) ? 'Yes' : 'No');
					 ?>
					<hr>
					<a href="order-form.php" class="btn btn-danger">Go back</a>
				</div>
			</div>
		</div>

	    <!-- Optional JavaScript -->
	    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>