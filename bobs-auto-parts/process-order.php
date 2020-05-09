<?php
	define('TIRE_PRICE', 100);
	define('OIL_PRICE', 50);
	define('SPARK_PRICE', 30);

	require_once('view-comp/header.php');
	require_once('service/order-service.php');
	require_once('service/vat-service.php');
?>

<h3 class="card-title">Order Result</h3>

<?php 
	echo '<p>Order Processed at ';
	echo date('H:i, jS F Y');
	echo '</p>';

						//comment 
						/**multiline comment
						**/

						$tireQty = $_POST['tireQty'] ? $_POST['tireQty'] : 0 ;
						$oilQty = $_POST['oilQty'] ? $_POST['oilQty'] : 0;
						$sparkQty = $_POST['sparkQty'] ? $_POST['sparkQty'] : 0;

						echo '<p>Your order is as follows</p>';
						//echo $tireQty. ' tires <br/>';
						echo "$tireQty tires<br/>";
						echo "$oilQty oil<br/>";
						echo "$sparkQty spark plugs<br/><br/>";

						// echo '<p>Prices<br/>';
						// echo 'Tires: '.TIRE_PRICE. '<br/>';
						// echo 'Oil: '.OIL_PRICE. '<br/>';
						// echo 'Spark Plugs: '.SPARK_PRICE. '<br/><br/>';


						$totalQty = @($tireQty + $oilQty + $sparkQty);  //@(surpress warning)
						$tireAmount = @($tireQty * TIRE_PRICE);
						$oilAmount = @($oilQty * OIL_PRICE);
						$sparkAmount = @($sparkQty * SPARK_PRICE);


						getVat(); //constant variable is in service/vat-service.php

						//type casting
						@$vatAmount = VAT_PERCENT * 100;
						@$totalAmount = (float) $tireAmount + $oilAmount + $sparkAmount;
						@$vatable = $totalAmount/(VAT_PERCENT+1);
						@$vat = VAT_PERCENT * $vatable;

						@$totalAmount = $vat + $vatable ;

						echo 'Total Quantity: '. $totalQty. '<br/><br/>';

						echo '<br/>VATable Amount: Php ' . $vatable . '</p>';
						echo 'VAT Amount ('. $vatAmount.'%): Php ' . $vat . '</p>';
						echo 'Total: Php '. $totalAmount.'</p>';

						echo 'Amount exceeded 500 but less than 1000? '. @($totalAmount > 500 && totalAmount < 1000 ? 'Yes':'No'). '<br/>';

						saveOrder($tireQty, $oilQty, $sparkQty, $totalAmount);

						?>
					</div>

					<div class="card-footer">
						<a class="btn btn-info" href="order-form.php">Go Back</a>
					</div>
				</div>


<?php
	require_once('view-comp/footer.php');
?>