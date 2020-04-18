<html>

<head>
	<title> Process Order </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

	<?php
		define('TIRE_PRICE', 100);
		define('OIL_PRICE', 300);
		define('SPARK_PRICE', 50);
	?>

	<div class="container">
		<div class ="card">
			<div class="card-body">
				<h1 class="card-title"> Bob's Auto Parts </h1>
				<br>
				<h3 class="card-title"> Order Results </h3>

				<?php
					echo '<p>Product Order Proccessed at ';
					echo date('H:i, jS F Y');
					echo '</p>';
				
					$tireQty = $_POST['tireQty'] ? $_POST['tireQty'] : 0;
					$oilQty = $_POST['oilQty'] ? $_POST['oilQty'] : 0;
					$sparkQty = $_POST['sparkQty'] ? $_POST['sparkQty'] : 0;

					echo '<br><p><b><i>Your order is as follows:</i></b></p>';
					echo $tireQty. ' <i>tires</i><br/>';
					echo $oilQty. ' <i>cans of oil</i><br/>';
					echo $sparkQty. ' <i>spark plugs</i><br/><br/>';

					// echo '<i>Prices Per Item</i><br/>';
					// echo 'Tires: PHP '.TIRE_PRICE.'<br/>';
					// echo 'Oil: PHP '.OIL_PRICE.'<br/>';
					// echo 'Spark Plugs: PHP '.SPARK_PRICE.'<br/><br/>';

					$totalQty = $tireQty + $oilQty + $sparkQty;
					echo '<b>Total Quantity:</b> '.$totalQty.'<br/><br/>';

					$tireAmount = $tireQty * TIRE_PRICE;
					$oilAmount = $oilQty * OIL_PRICE;
					$sparkAmount = $sparkQty * SPARK_PRICE;

					$totalAmount = $tireAmount + $oilAmount + $sparkAmount;
					// echo '<i>Cost Breakdown</i><br/>';
					// echo 'Tires: PHP '.$tireAmount.'<br/>';
					// echo 'Oil: PHP '.$oilAmount.'<br/>';
					// echo 'Spark Plugs: PHP '.$sparkAmount.'<br/><br/>';

					$vatable = $totalAmount / 1.12;
					$vat = $vatable * 0.12;
					$total = $vat + $vatable;

					echo '<i>VATable Amount:</i> PHP '.$vatable.'<br/>';
					echo '<i>VAT Amount (12%):</i> PHP '.$vat.'<br/>';
					
					echo '<b>Total Amount:</b> PHP '.$total.'<br/><br/>';

					echo 'Amount exceeded 500 & less than 1000? '.($totalAmount > 500 && $totalAmount < 1000?'<i>Yes</i>' : '<i>No</i>').'<br/>';


				?>

				<br>
				<br>

				<a href ="order-form.php" class="btn btn-primary"> Go Back </a>

			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>