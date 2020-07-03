<?php
	require_once 'view-comp/header.php';
?> 
<h1>Bob's Auto Parts</h1>
<h3 class="class-title">Order Process</h3>
<?php
	// define("TIRE_PRICE", 100);
	// define("OIL_PRICE", 100);
	// define("SPARK_PRICE", 100);
	echo "<p>Ordered Proccess at ";
	echo date('G:i, jS F Y');
	echo "</p>";
	$find = @($_POST['find']);
	if (!$find) {
		echo "<a href=\"order-form.php\" class=\"btn-link\">Click here</a> to go back";
	} else {
		switch ($find) {
			case 'regular':
				echo "<p>Regular Customer</p>";
				break;
			case 'tv':
				echo "<p>From TV advertising</p>";
				break;
			case 'phone':
				echo "<p>From phone directory</p>";
				break;
			case 'mouth':
				echo "<p>From word of mouth</p>";
				break;
			default:
				echo "<p>Unknown Customer</p>";
				break;
		}
		// $product = array(
		// 	array('Code' => 'OIL',
		// 		'Description' => 'Oil',
		// 		'Price' => 10),
		// 	array('Code' => 'TIRE',
		// 		'Description' => 'Tire',
		// 		'Price' => 100),
		// 	array('Code' => 'SPARK',
		// 		'Description' => 'Spark',
		// 		'Price' => 5)
		// );

		require 'classes/product.php';
		session_start();
		$tire = $_SESSION['tire'];
		$oil = $_SESSION['oil'];
		$spark = $_SESSION['spark'];
		if (!$tire || !$oil || !$spark) {
			echo "<a href=\"order-form.php\" class=\"btn-link\">Click here</a> to go back";
		} else {
			$tire->__set('qty', $_POST['tireQty']);
			$oil->__set('qty', $_POST['oilQty']);
			$spark->__set('qty', $_POST['sparkQty']);
			// foreach ($product as $items) {
			// 	foreach ($items as $prices => $value) {
			// 		if ($items['Description'] == 'Oil') {
			// 			$oilPrice = @($value * $oilQty);
			// 		} else if ($items['Description'] == 'Tire') {
			// 			$tirePrice = @($value * $tireQty);
			// 		} else if ($items['Description'] == 'Spark') {
			// 			$sparkPrice = @($value * $sparkQty);
			// 		}
			// 	}
			// }
			// $tirePrice = $tireQty * TIRE_PRICE;
			// $oilPrice = $oilQty * OIL_PRICE;
			// $sparkPrice = $sparkQty * SPARK_PRICE;
			$totalPrice = @($tire->getTotalPrice() + $oil->getTotalPrice() + $spark->getTotalPrice());

			$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
			$dir = "$DOCUMENT_ROOT/dragon-php/bobs-auto-parts/resource/order.txt";
			
			$file = fopen($dir, 'ab');
			$strinput = date('G:i, jS F Y')."\t".$tire->__get('qty')." ".$tire->__get('name')."\t".$oil->__get('qty')." ".$oil->__get('name')."\t".$spark->__get('qty')." ".$spark->__get('name')."\t ₱".$totalPrice."\n";
			fwrite($file, $strinput);
			fclose($file);

			$dir = "$DOCUMENT_ROOT/dragon-php/bobs-auto-parts/resource/properties.txt";
			$file = fopen($dir, 'rb');
			while (!feof($file)) {
				$order = fgets($file, 999);
			}
			$text = explode("=", $order);
			$percent = (float)$text[1];
			echo "$percent";
			
			$vatableAmount = $totalPrice / ($percent + 1);
			$vatAmount = $vatableAmount * $percent;
			echo "<p> Your order is as follows</p>";
			echo $tire->__get('qty')." tires.<br>";
			echo $oil->__get('qty')." bottles of oil.<br>";
			echo $spark->__get('qty')." spark plugs<br>";
			echo "<br><br>";
			echo "VATable Amount: $vatableAmount<br>";
			echo "VAT Amount(12%): $vatAmount<br>";
			echo "Total Price: $totalPrice<br><br>";
			echo "Amount exceeded 500 but less than 1000? "; 
			echo ($totalPrice < 1000 && $totalPrice > 500 ? 'Yes' : 'No');
			echo "<h2>Frieght Cost</h2>";
			$distance = 50;
			echo "<table class=\"table\">
				<thead>
					<tr class=\"row\">
						<th class=\"col-3\">Distance</td>
						<th class=\"col-3\">Price</td>
					</tr>
				</thead>
			";
			while ($distance <= 250) {
				echo "
					<tr class=\"row\">
						<td class=\"col-3\">$distance</td>
						<td class=\"col-3\">PHP " .($distance / 10)."</td>
					</tr>
				";
				$distance += 50;
			}
			for ($i=300; $i < $distance ; $distance+=50, $i+=50) { 
				echo "
					<tr class=\"row\">
						<td class=\"col-3\">$distance</td>
						<td class=\"col-3\">PHP " .($distance / 10)."</td>
					</tr>
				";
			}
			do {
				echo "
					<tr class=\"row\">
						<td class=\"col-3\">$distance</td>
						<td class=\"col-3\">PHP " .($distance / 10)."</td>
					</tr>
				";
				$distance += 50;
			} while ($distance <= 750);
			echo "</table>";
		}
	}
?>
<?php 
	require_once 'view-comp/footer.php';
?>