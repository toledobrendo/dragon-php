<?php 
	// array of product objects
	require_once('data/product.php');
	require_once('service/order-service.php');

	function getVatPercent() {
		$propertiesFile = fopen($_SERVER['DOCUMENT_ROOT'] . '/dragon-php/bobs-autoparts/resource/properties.txt', 'rb');

		if(!$propertiesFile) {
			$vatPercent = 0;
		} else {

			while(!feof($propertiesFile)) {
				$line = fgets($propertiesFile, 999);
				$vatPercent = str_replace("VAT_PERCENT=", "", $line);
				
			}
		}

		return $vatPercent;
	}

	define('VAT_PERCENT', getVatPercent());
?>

<!DOCTYPE html>
<html>
<head>
	<title>Thank you for your purchase.</title>

	<style type="text/css">
		.wrapper {
			padding: 20px;
		}
	</style>

	<?php require_once('view-comp/head-links.php'); ?>
</head>
<body>
	<?php
		require_once('view-comp/nav.php');
	?>

	<div class="wrapper">
		<div class="container">
			<div class="card">
				<div class="card-body">
					<h3 class="card-title"></h3>
						<?php
							echo '<h2>Order Processed at ';
							echo date('H:i, jS F Y');
							echo '</h2>';

							$tirQty = $_POST['tirQty'];
							$oilQty = $_POST['oilQty'];
							$skpQty = $_POST['skpQty'];

							$total = 600;
							
							$VAT_PERCENT = 
							$VATpercent = VAT_PERCENT;
							$VATable = $total / (1 + $VATpercent);
							$VAT = $VATable * $VATpercent;

							echo '<h5>Your order is:<br></h5>';
							echo $tirQty. '<span> '. $partsObject[0]->name . '/s</span><br>';
							echo $oilQty. '<span> '. $partsObject[1]->name . '/s</span><br>';
							echo $skpQty. '<span> '. $partsObject[2]->name . '/s</span><br>';
							echo '<br>';

							
							echo '<br>VATable Amount: ' . $VATable;
							echo '<br>VAT Amount: ' . $VAT;
							echo '<br>Total Amount: ' . $total;
							echo '<br><br>Amount greater than 500 but less than 1000?: ';
								echo ($total > 500 && $total < 1000) ? 'YES' : 'NO'; 
							echo '<p><br></p>';

							saveOrder($tirQty, $oilQty, $skpQty, $total);
						?>

						<a class="btn btn-primary" href="order-form.php" role="button">Back to home.</a>
				</div>
			</div>
		</div>
	</div>

	<?php
		require_once('view-comp/footer.php');
	?>

	<?php
		require_once('view-comp/dependencies.php');
	?>
	
</body>
</html>