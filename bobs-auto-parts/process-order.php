<!DOCTYPE html>
<?php 
	// constant variables
	define('TIRE_PRICE', 100);
	define('OIL_PRICE', 50);
	define('SPARK_PRICE', 30);


 ?>
 <?php 
	require_once('view-comp/header.php');
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
		
					<h2 class="card-title">Bob's Auto Parts</h2>
					<h3 class="card-title">Order Result</h3>
					<?php 
						echo '<p>Order Processed on ';
						echo date('H:i, jS F Y');
						echo '</p>';

						// from html
						$tireQty = $_POST['tireQty'];
						$oilQty = $_POST['oilQty'];
						$sparkQty = $_POST['sparkQty'];
						$find = $_POST['find'];

						switch($find) {
							case 'regular':
								echo 'Regular customer<br/>';
								break;
							case 'tv':
								echo 'From TV advertising<br/>';
								break;
							case 'phone':
								echo 'Phone directory<br/>';
								break;
							case 'mouth':
								echo 'Word of the mouth<br/>';
								break;
						}

						$totalQty = $tireQty + $oilQty + $sparkQty;

						echo '<br/><b>Order List</b>:<br/>';
						if($totalQty != 0) {
							if($tireQty > 0) {
								// single quote: variables must be outside
								echo $tireQty.' tires<br/>';
							}
							if($oilQty > 0) {
								// double quote: variables can be inside
								echo "$oilQty bottles of oil<br/>";
							}
							if($sparkQty > 0) {
								echo "$sparkQty spark plugs<br/>";
							}
						} else {
							echo 'You did not order anything.<br/>';
						}

						echo '<br/><b><p>Prices:</b>';
						echo '<br/>Tires: '.TIRE_PRICE;
						echo '<br/>Oil: '.OIL_PRICE;
						echo '<br/>Spark Plug: '.SPARK_PRICE;

						// NOTE: arithmetic operations expect a numerical value, but php attempts to do the operation regardless (expect a warning message in your webpage though)

						// to hide warnings, do @(operationHere)


						// quantity
						echo '<br/><br/><b>Total Quantity</b>: '.$totalQty;

						

						// prices
						$tireAmt = TIRE_PRICE * $tireQty;
						$oilAmt = OIL_PRICE * $oilQty;
						$sparkAmt = SPARK_PRICE * $sparkQty;

						// summary
						echo '<br/><b><p>Summary:</b>';
						$subtotalPrice = $tireAmt + $oilAmt + $sparkAmt;

						// VAT
						$VATableAmt = $subtotalPrice / 1.12;
						$VAT = 0.12 * $VATableAmt;
						$totalPrice = $VATableAmt + $VAT;

						echo '<br/>VATable Amount: '.$VATableAmt;
						echo '<br/>VAT Amount: '.$VAT;

						echo '<br/><br/><b>Total amount</b>: '.$totalPrice;

						// ternary operation
						echo '<br/><br/>Amount Exceeded 500? but less than 1000? '.(($totalPrice > 500 && $totalPrice < 1000) ? 'Yes' : 'No');

						// ternary functions

						// unset($totalPrice);

						echo '<br/>Is $totalPrice string? '.(is_string($totalPrice) ? 'Yes' : 'No');
						echo '<br/>Is %totalPrice set? '.(isset($totalPrice) ? 'Yes' : 'No');
						// a value of 0 is still empty
						echo '<br/>Is %totalPrice empty? '.(empty($totalPrice) ? 'Yes' : 'No');
					 ?>
					<hr>
					<a href="order-form.php" class="btn btn-danger">Go back</a>
	
	<?php 
		require_once('view-comp/footer.php');
	 ?>
	 
</html>