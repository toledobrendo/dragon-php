<?php
	require_once('view-comp/header.php');
	require_once('objects/product-objects.php');
	require_once('service/vat-service.php');

	define('VAT_AMOUNT', getVatRate());
?>

	<h1 class="card-title"> Bob's Auto Parts </h1>
	<br>
	<h3 class="card-title"> Order Results </h3>

	<?php
		echo '<p>Product Order Proccessed at ';
		echo date('H:i, jS F Y');
		echo '</p>';
				
		$_POST['tireQty'] ? $items[0]->__set('quantity', $_POST['tireQty']) : $items[0]->__set('quantity', 0);
		$_POST['oilQty'] ? $items[1]->__set('quantity', $_POST['oilQty']) : $items[1]->__set('quantity', 0);
		$_POST['sparkQty'] ? $items[2]->__set('quantity', $_POST['sparkQty']) : $items[2]->__set('quantity', 0);
		$totalQty = $items[0]->__get('quantity') + $items[1]->__get('quantity') + $items[2]->__get('quantity');

		switch($_POST['find']) {
			case'regular':
				echo 'Regular Customer <br/>';
				break;
			case'tv':
				echo 'From TV advertising <br/>';
				break;
			case'phone':
				echo 'From Phone Directory <br/>';
				break;
			case'word':
				echo 'From Word of Mouth <br/>';
				break;
		}

		if($totalQty == 0) {
			echo '<i>You did not order anything </i><br/><br/>';
		} else {
			echo '<br><p><b><i>Your order is as follows:</i></b></p>';

		if ($items[1]->__get('quantity') > 0) {
			echo $items[1]->__get('quantity'). ' <i>'.$items[1]->__get('description').'</i><br/>';}

		if ($items[0]->__get('quantity') > 0) {
			echo$items[0]->__get('quantity'). ' <i>'.$items[0]->__get('description').'</i><br/>';}

		if ($items[2]->__get('quantity') > 0) {
			echo$items[2]->__get('quantity'). ' <i>'.$items[2]->__get('description').'</i><br/>';} 
		}
		
		// echo '<i>Prices Per Item</i><br/>';
		// echo 'Tires: PHP '.TIRE_PRICE.'<br/>';
		// echo 'Oil: PHP '.OIL_PRICE.'<br/>';
		// echo 'Spark Plugs: PHP '.SPARK_PRICE.'<br/><br/>';

		echo '<br/><b>Total Quantity:</b> '.$totalQty.'<br/><br/>';

		$items[0]->computeCost();
		$items[1]->computeCost();
		$items[2]->computeCost();

		$totalAmount = $tires->__get('cost') + $oil->__get('cost') + $sparkplugs->__get('cost');
		// echo '<i>Cost Breakdown</i><br/>';
		// echo 'Tires: PHP '.$tireAmount.'<br/>';
		// echo 'Oil: PHP '.$oilAmount.'<br/>';
		// echo 'Spark Plugs: PHP '.$sparkAmount.'<br/><br/>';

		$vatable = $totalAmount / (1 + VAT_AMOUNT);
		$vat = $vatable * VAT_AMOUNT;
		$total = $vat + $vatable;

		echo '<i>VATable Amount:</i> PHP '.$vatable.'<br/>';
		echo '<i>VAT Amount ('.VAT_AMOUNT.'):</i> PHP '.$vat.'<br/>';
					
		echo '<b>Total Amount:</b> PHP '.$total.'<br/><br/>';

		echo '<i>Amount exceeded 500 & less than 1000? </i>'.($totalAmount > 500 && $totalAmount < 1000?'<i>Yes</i>' : '<i>No</i>').'<br/>';

		// echo '<i>Is $totalAmount a string? </i>';
		// echo is_string($totalAmount) ? '<i>Yes</i><br/>' : '<i>No</i><br/>';

		// echo '<i>Is $totalAmount set? </i>';
		// echo isset($totalAmount) ? '<i>Yes</i><br/>' : '<i>No</i><br/>';

		// unset($totalAmount);

		// $totalAmountTwo;

		// echo '<i>Is $totalAmountTwo set? </i>';
		// echo isset($totalAmount) ? '<i>Yes</i><br/>' : '<i>No</i><br/>';

		// echo '<i>Is $totalAmountTwo empty? </i>';
		// echo empty($totalAmount) ? '<i>Yes</i><br/>' : '<i>No</i><br/>';

		saveOrder($tires->__get('quantity'), $oil->__get('quantity'), $sparkplugs->__get('quantity'), $totalAmount);

	?>

	<br>
	<br>

	<a href ="order-form.php" class="btn btn-primary"> Go Back </a>

			</div>
		</div>
	</div>

<?php
	require_once('view-comp/footer.php');
?>