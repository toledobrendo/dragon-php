<!-- above html define constants -->
<?php
	define('TIRE_PRICE',	100);
	define('OIL_PRICE',		 50);
	define('SPARK_PRICE',	 30);
?>
<html>

<head>
	<title> Bob's Auto Parts </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet"
		href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
		crossorigin="anonymous">
</head>
<body>
	<div class = "container">
		<div class = "card">
			<div class = "card-body">

				<!--start-->
				<h3 class = "card title">Order Results</h3>

        <?php
          echo '<p>Order Processed at ';
          echo date('H:i, jS F Y');
          echo '</p>';

					//for every total do this and the following
					$tireQty = $_POST['tireQty'];
					$oilQty = $_POST['oilQty'];
					$sparkQty = $_POST['sparkQty'];
					//dropbox selection, followed by switch statements
					$find = $_POST['find'];

					//switch statement
					switch($find){
						//case value = ""
						case 'regular':
							echo 'Regular Customer';
							break;
						case 'tv':
							echo 'From TV advertisement';
							break;
						case 'phone':
							echo 'From Phone Directory';
							break;
						case 'mouth':
							echo 'From Word of Mouth';
							break;
						default :
							echo 'Unknown Customer';
							break;
					}

					echo '<br/><br/>'; // skip a line

					//moved to if statements below
          // echo '<p>Your order is as follows</p>';
					// echo $tireQty.' tires<br/>';
					// //echo "$tireQty tires<br/>";
					// echo $oilQty.' bottles of oil<br/>';
					// echo $sparkQty.' spark plugs<br/><br/>';

					echo '<p>Prices<br/>';
					echo 'Tires: '.TIRE_PRICE.'<br/>';
					echo 'Oil: '.OIL_PRICE.'<br/>';
					echo 'Spark Plugs: '.SPARK_PRICE.'<br/><br/>';

					// total
					$totalQty = @($tireQty + $oilQty + $sparkQty);

					//if statements
					if($totalQty == 0){
						echo 'you did not order anything.<br/><br/>';
					} else {

						echo '<p>Your order is as follows</p>';
						//if statements one line if (condition) echo 'something'; no else
						if ($tireQty > 0)
							echo $tireQty.' tires<br/>';
						//echo "$tireQty tires<br/>";
						if ($oilQty > 0)
						echo $oilQty.' bottles of oil<br/>';
						if ($sparkQty > 0)
						echo $sparkQty.' spark plugs<br/><br/>';
						echo '<br/>';
					}

					echo 'Total Quantity: '.$totalQty.'<br/>';

					$tireAmount	= @($tireQty 	* TIRE_PRICE);
					$oilAmount 	= @(oilQty		* OIL_PRICE);
					$sparkAmount	= @($sparkQty	* SPARK_PRICE);
													//type casting
					$totalAmount = (float) ($tireAmount + $oilAmount + $sparkAmount);
					echo 'Total Amount: '. $totalAmount. '<br/>';

					$vatableAmount = $totalAmount / 1.12;
					$vat = $totalAmount - $vatableAmount;

					echo 'VATable Amount: '.$vatableAmount.'<br/>';
					echo 'VAT: '.$vat.'<br/>';

					echo 'Amount exceeded 500? '.($totalAmount > 500 ? 'Yes' : 'No').'<br/>';
					// the use of is_string to test if the var is a string
					echo 'is $totalAmount string? '.(is_string($totalAmount) ? 'Yes' : 'No').'<br/>';

					//isset to test if var has been declared
					echo 'is $totalAmount declared as a variable: '.(isset($totalAmount) ? 'Yes'	: 'No').'<br/>';
					echo 'is $totalAmTwo declared as a variable: ' .(isset($totalAmTwo) ? 'Yes'	: 'No').'<br/>';

					//unset to undeclare a variable
					//unset(var);

					//test if has a value
					echo 'is $totalAmount empty: '.(empty($totalAmTwo) ? 'Yes' : 'No').'<br/>';// truthy falsie



        ?>

				<!--end-->
			</div>
			<div class = "card-footer">
				<a class = " btn btn-info" href = "order-form.php">Go Back</a>
			</div> <!-- under card-body -->
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
		integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
		integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
		crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
		integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
		crossorigin="anonymous"></script>
</body>

</html>
