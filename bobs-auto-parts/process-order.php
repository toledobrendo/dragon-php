<?php
	define('TIRE_PRICE', 100);
	define('OIL_PRICE', 50);
	define('SPARK_PRICE', 30);
?>

<?php
	require_once('view-comp/header.php');
?>
				<h3 class="card-title">Order Results</h3>
				<?php 
					echo '<p>Order Processed at ';
					echo date('H:i, jS F Y');
					echo '</p>';

					//PHP Comments
					/** Multiline comments
						Wow**/

					//declaring the variables
					//gets the data from the form submitted
					//@ suppresses warning, making them not seen
					$tireQty = $_POST['tireQty'] ? $_POST['tireQty'] : 0;
					$oilQty = $_POST['oilQty'] ? $_POST['oilQty'] : 0;
					$sparkQty = $_POST['sparkQty'] ? $_POST['sparkQty'] : 0;
					$totalQty = @($tireQty + $oilQty + $sparkQty);

					$find = $_POST['find'];

					switch ($find) {
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
							echo 'From word of mouth';
							break;
						
						default:
							echo 'Unknown Customer';
							break;
					}

					echo '<p>Prices:<br/>';
					echo 'Tires: '.TIRE_PRICE.'<br/>';
					echo 'Oil: '.OIL_PRICE.'<br/>';
					echo 'Sparks Plugs: '.SPARK_PRICE.'<br/><br/>';

					if($totalQty == 0){
						echo 'You did not order anything! <br/><br/>';
					} else {
						echo '<p>Your order is as follows</p>';
						if($tireQty > 0)
							echo "$tireQty tires<br/>";
						if($oilQty > 0)
							echo "$oilQty oil<br/>";
						if($sparkQty > 0)
							echo "$sparkQty spark plugs<br/>";
						//different way of display
						//echo $tireQty.' $tireQty tires<br/>';
					}

					$tireAmount = @($tireQty * TIRE_PRICE);
					$oilAmount = @($oilQty * OIL_PRICE);
					$sparkAmount = @($sparkQty * SPARK_PRICE);

					$totalAmount = @((float) ($tireAmount + $oilAmount + $sparkAmount));
					$otherTotalAmount = &$totalAmount; //pointer to reference in $totalAmount
					$otherTotalAmount += $oilAmount;

					$vatableAmount = @((float)($totalAmount / 1.12));
					$vatAmount = @((float)($vatableAmount * 0.12));
					
					echo 'Total Quantity: '.$totalQty.'<br/>';
					echo 'VATABLE Amount: '.$vatableAmount.'<br/>';
					echo 'VAT Amount(12%): '.$vatAmount.'<br/>';
					echo 'Total Amount: '.$totalAmount.'<br/>';
					echo 'Other Total Amount: '.$otherTotalAmount.'<br/>';
					echo 'Amount Exceeded 500 but less than 1000? '.($totalAmount > 500 && $totalAmount < 1000 ? 'Yes' : 'No').'<br/><br/>';

					echo 'Is $totalAmount String? '.(is_string($totalAmount) ? 'Yes' : 'No').'<br/>';

					unset($totalAmount);
					//checks if the variable has a value set to it
					echo 'Is $totalAmount set? '.(isset($totalAmount) ? 'Yes' : 'No').'<br/>';

					$totalAmountTwo = "";
					echo 'Is $totalAmountTwo set? '.(isset($totalAmountTwo) ? 'Yes' : 'No').'<br/>';
					//if 0 or "" it will show 'Yes'
					echo 'Is $totalAmountTwo empty? '.(empty($totalAmountTwo) ? 'Yes' : 'No').'<br/>';
				?>
				<tr class="row">
					<td colspan="2" class="col-12">
						<a href="order-form.php" class="btn btn-danger float-right">Go Back</a>
					</td>
				</tr>	
			</div>
		</div>
	</div>

<?php
	require_once('view-comp/footer.php');
?>