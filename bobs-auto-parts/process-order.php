<?php
	require_once('view/header.php');
?>
	<h1 class="card-title"> Bob's Auto Parts </h1>
	<br>
	<h3 class="card-title"> Order Results </h3>

	<?php
	define('TIRE_PRICE', 100);
	define('OIL_PRICE', 100);
	define('SPARK_PRICE', 100);

          echo '<p>Order Processed at ';
          echo date('H:i, jS F Y');
	echo '</p>';

	//comment in php
	/**Multiline comment
	ad **/
	$tireQty = $_POST['tireQty'];
	$oilQty = $_POST['oilQty'];
	$sparkQty = $_POST['sparkQty'];
	$find = $_POST['find'];

	switch($find) {
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
			echo 'From Word of Mouth';
			break;
		default:
			echo 'Unknown Customer';
			break;
	}

	echo '<p>Your order is as folows</p>';
	echo $tireQty.' tires.<br/>';
	//concatination in php is dot
	echo "$oilQty bottles of oil.<br/>";
	echo "$sparkQty spark plugs.<br/></br>";

	$total = (TIRE_PRICE * $tireQty) + (OIL_PRICE * $oilQty) + (SPARK_PRICE * $sparkQty);
	$vatable = $total / 1.12;
	$vat = $total - $vatable;

	echo "VATable Amount: $vatable <br/>";
	echo "VAT Amount (12%): $vat <br/>";
	echo "Total Amount: $total <br/>";

	echo "<br>Amount exceeded 500 but less than 1000? ".(500 < $total ? ($total < 1000 ? 'yes': 'no') : 'no').'<br><br>';

	?>

	<br>
	<br>

	<a href ="order-form.php" class="btn btn-primary"> Go Back </a>

<?php
	require_once('view/footer.php');
?>
