<?php
	require_once('view-comp/header.php');
	require_once('script.php');
	require_once('service/order-service.php');
	require_once('exception/file-not-found-exception.php');
	define('VAT_PERCENT', textToFloatVAT());
?>
				<h3 class="card-title">Order Results</h3>
				<?php
					echo VAT_PERCENT;
					echo '<p>Order Processed at ';
					echo date('H:i, jS F Y');
					echo '</p>';

					//PHP Comments
					/** Multiline comments
						Wow**/

					//declaring the variables
					//gets the data from the form submitted
					//@ suppresses warning, making them not seen
					$tires->qty = $_POST['tireQty'];
					$oil->qty = $_POST['oilQty'];
					$sparkPlug->qty = $_POST['sparkQty'];
					$totalQty = @($tires->qty + $oil->qty + $sparkPlug->qty);

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
					echo 'Tires: '. $tires->price .'<br/>';
					echo 'Oil: '. $oil->price .'<br/>';
					echo 'Sparks Plugs: '. $sparkPlug->price .'<br/><br/>';

					if($totalQty == 0){
						echo 'You did not order anything! <br/><br/>';
					} else {
						echo '<p>Your order is as follows</p>';
						if($tires->qty > 0)
							echo "$tires->qty tires<br/>";
						if($oil->qty > 0)
							echo "$oil->qty oil<br/>";
						if($sparkPlug->qty > 0)
							echo "$sparkPlug->qty spark plugs<br/>";
						//different way of display
						//echo $tireQty.' $tireQty tires<br/>';
					}

					$tireAmount = @($tires->qty * $tires->price);
					$oilAmount = @($oil->qty * $oil->price);
					$sparkAmount = @($sparkPlug->qty * $sparkPlug->price);

					$totalAmount = @((float) ($tireAmount + $oilAmount + $sparkAmount));
					$otherTotalAmount = &$totalAmount; //pointer to reference and directly change $totalAmount
					//$otherTotalAmount += $oilAmount;

					$vatableAmount = @((float)($totalAmount / (1 + VAT_PERCENT)));
					$vatAmount = @((float)($vatableAmount * VAT_PERCENT));
					
					echo 'Total Quantity: '.$totalQty.'<br/>';
					echo 'VATABLE Amount: '.$vatableAmount.'<br/>';
					echo 'VAT Amount(12%): '.$vatAmount.'<br/>';
					echo 'Total Amount: '.$totalAmount.'<br/>';
					echo 'Other Total Amount: '.$otherTotalAmount.'<br/>';
					echo 'Amount Exceeded 500 but less than 1000? '
					. ($totalAmount > 500 && $totalAmount < 1000 ? 'Yes' : 'No')
					. '<br/><br/>';

					echo 'Is $totalAmount String? '.(is_string($totalAmount) ? 'Yes' : 'No').'<br/>';

					//unset($totalAmount);
					
					//checks if the variable has a value set to it
					echo 'Is $totalAmount set? '.(isset($totalAmount) ? 'Yes' : 'No').'<br/>';

					$totalAmountTwo = "";
					echo 'Is $totalAmountTwo set? '.(isset($totalAmountTwo) ? 'Yes' : 'No').'<br/>';
					//if 0 or "" it will show 'Yes'
					echo 'Is $totalAmountTwo empty? '.(empty($totalAmountTwo) ? 'Yes' : 'No').'<br/>';

					saveOrder($tires->qty, $oil->qty, $sparkPlug->qty, $totalAmount);
					//getOrders();
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