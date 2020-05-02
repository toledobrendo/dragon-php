<?php
	require_once('view-comp/header.php');
?>

	<?php
		define('TIRE_PRICE', 100);
		define('OIL_PRICE', 300);
		define('SPARK_PRICE', 50);
	?>

				<h1 class="card-title"> Bob's Auto Parts </h1>
				<br>
				<h3 class="card-title"> Order Results </h3>

				<?php
					echo '<p>Product Order Proccessed at ';
					echo date('H:i, jS F Y');
					echo '</p>';
				
					$_POST['tireQty'] ? $tires->__set('quantity', $_POST['tireQty']) : $tires->__set('quantity', 0);
					$_POST['oilQty'] ? $oil->__set('quantity', $_POST['oilQty']) : $oil->__set('quantity', 0);
					$_POST['sparkQty'] ? $sparkplugs->__set('quantity', $_POST['sparkQty']) : $sparkplugs->__set('quantity', 0);
					$totalQty = $tires->__get('quantity') + $oil->__get('quantity') + $sparkplugs->__get('quantity');

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

						if ($oil->__get('quantity') > 0) {
							echo $oil->__get('quantity'). ' <i>'.$oil->__get('description').'</i><br/>';}
							
						if ($tires->__get('quantity') > 0) {
							echo $tires->__get('quantity'). ' <i>'.$tires->__get('description').'</i><br/>';}

						if ($sparkplugs->__get('quantity') > 0) {
							echo $sparkplugs->__get('quantity'). ' <i>'.$sparkplugs->__get('description').'</i><br/>';} 
					}
					// echo '<i>Prices Per Item</i><br/>';
					// echo 'Tires: PHP '.TIRE_PRICE.'<br/>';
					// echo 'Oil: PHP '.OIL_PRICE.'<br/>';
					// echo 'Spark Plugs: PHP '.SPARK_PRICE.'<br/><br/>';

					
					echo '<br/><b>Total Quantity:</b> '.$totalQty.'<br/><br/>';

					$tires->computeCost();
					$oil->computeCost();
					$sparkplugs->computeCost();

					$totalAmount = $tires->__get('cost') + $oil->__get('cost') + $sparkplugs->__get('cost');
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

					echo '<i>Amount exceeded 500 & less than 1000? </i>'.($totalAmount > 500 && $totalAmount < 1000?'<i>Yes</i>' : '<i>No</i>').'<br/>';

					// echo '<i>Is $totalAmount a string? </i>';
					// echo is_string($totalAmount) ? '<i>Yes</i><br/>' : '<i>No</i><br/>';

					// echo '<i>Is $totalAmount set? </i>';
					// echo isset($totalAmount) ? '<i>Yes</i><br/>' : '<i>No</i><br/>';

					// // unset($totalAmount);

					// $totalAmountTwo;

					// echo '<i>Is $totalAmountTwo set? </i>';
					// echo isset($totalAmount) ? '<i>Yes</i><br/>' : '<i>No</i><br/>';

					// echo '<i>Is $totalAmountTwo empty? </i>';
					// echo empty($totalAmount) ? '<i>Yes</i><br/>' : '<i>No</i><br/>';

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