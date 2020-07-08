<?php
	require_once('view-comp/header.php');
	require_once('model/product-details.php');
	require_once('service/formulas.php');
?>
				<h3 class="card-title"> Order Results </h3>

				<?php
					echo '<p>Product Order Processed at ';
					echo date('H:i, jS F Y');
					echo '</p>';
					
					$tires->quantity = $_POST['tireQty'] ? $_POST['tireQty'] : 0;
					$oil->quantity = $_POST['oilQty'] ? $_POST['oilQty'] : 0;
					$sparksPlug->quantity = $_POST['sparkQty'] ? $_POST['sparkQty'] : 0;
					$find=$_POST['find'];

					switch ($find) {
					case 'regular':
						echo '<p> Regular customer';
						break;
					case 'tv-advertising':
						echo '<p> From TV Advertisement';
						break;
					case 'phone-directory':
						echo '<p> From Phone Directory';
						break;
					case 'word-of-mouth':
						echo '<p> From Word of Mouth';
						break;
					}  

        			echo '<p>Prices<br/>'; 
        			echo 'Tires: Php '.$tires->price.'<br/>'; 
        			echo 'Oil: Php '.$oil->price.'<br/>'; 
        			echo 'Spark Plugs: Php '.$sparksPlug->price.'<br/>'; 

					$totalQty=@TotalQuantity($tires->quantity, $oil->quantity, $sparksPlug->quantity);

					if($totalQty==0){
						echo '<br/><br/><b>You didn\'t order anything.</b> <br/> <br/>';
					} else{
						echo '<br/><b><p> Your order is as follows: </b></p>';		
						if ($tires->quantity>0) 
						echo $tires->quantity. ' tires<br/>';
						if($oil->quantity>0)
						echo $oil->quantity. ' cans of oil<br/>';
						if($sparksPlug->quantity>0)
						echo $sparksPlug->quantity. ' spark plugs<br/>';	
					}

					$totalAmount= @TotalAmount($tires->quantity, $oil->quantity, $sparksPlug->quantity, $tires->price, $oil->price, $sparksPlug->price);
					
					$VATable= @computeVatableAmount($totalAmount);

					$VAT= @computeVatAmount($VATable);

					echo '<p><b>Total Amount: </b>'.$totalAmount.'</p>';
					echo '<br><p><b>VATable Amount: </b>'.$VATable;
					echo '<br><p><b> VAT Amount (12%): </b>'.$VAT;
					echo '<br><p><b> Amount Exceeded 500 but less than 1000? </b>'.($totalAmount>500 && $totalAmount<1000?'Yes.':'No.');
				?>

				<br>
				<br>

				<a href ="/dragon-php/assignments/order-form-classes/order-form.php" class="btn btn-primary"> Go Back </a>
<?php
	require_once('view-comp/footer.php');
?>