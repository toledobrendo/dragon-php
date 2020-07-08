<?php
	require_once('view-comp/header.php');
	require_once('service/order-service.php');	
?>
				<h1 class="card-title"> Bob's Auto Parts </h1>
				<br>
				<h3 class="card-title"> Order Results </h3>

				<?php
					echo '<p>Product Order Processed at ';
					echo date('H:i, jS F Y');
					echo '</p>';
					
					$tireQty = $_POST['tireQty'] ? $_POST['tireQty'] : 0;
					$oilQty = $_POST['oilQty'] ? $_POST['oilQty'] : 0;
					$sparkQty = $_POST['sparkQty'] ? $_POST['sparkQty'] : 0;
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
					define('TIRE_PRICE', 100);
					define('OIL_PRICE', 50);
					define('SPARK_PRICE', 30);
					define('VAT_AMOUNT', 0.12);
					
					echo '<b><p> Prices <br/></b>';
					echo '<p>Tires: '.TIRE_PRICE;
					echo '<p>Oil: '.OIL_PRICE;
					echo '<p>Sparks: '.SPARK_PRICE;

					$totalQty=@($tireQty+$oilQty+$sparkQty); 

					if($totalQty==0){
						echo '<br/><br/><b>You didn\'t order anything.</b> <br/> <br/>';
					} else{
						echo '<br/><b><p> Your order is as follows: </b></p>';		
						if ($tireQty>0) 
						echo $tireQty. ' tires<br/>';
						if($oilQty>0)
						echo $oilQty. ' cans of oil<br/>';
						if($sparkQty>0)
						echo $sparkQty. ' spark plugs<br/>';	
					}
					echo '<br/><b>Total Quantity: </b>'.$totalQty;

					$tireAmount=@($tireQty* TIRE_PRICE);
					$oilAmount=@($oilQty* OIL_PRICE);
					$sparkAmount= @($sparkQty* SPARK_PRICE);

					$totalAmount=(float)$tireAmount; //100
					$totalAmount += $oilAmount; //300
					$otherTotalAmount = &$totalAmount;
					$otherTotalAmount += $sparkAmount; //600
					$totalAmount2=@($VAT+$VATable);
					$VATable=@($totalAmount/1.12);
					$VAT=@(VAT_AMOUNT*$VATable);

					echo '<p><b>Total Amount: </b>'.$totalAmount.'</p>';
					echo '<br><p><b>VATable Amount: </b>'.$VATable;
					echo '<br><p><b> VAT Amount (12%): </b>'.$VAT;
					echo '<br><p><b> Amount Exceeded 500 but less than 1000? </b>'.($totalAmount>500 && $totalAmount<1000?'Yes.':'No.');

					saveOrder($tireQty,$oilQty,$sparkQty,$totalAmount);

				
				?>

				<br>
				<br>

				<a href ="/dragon-php/bobs-auto-parts/order-form.php" class="btn btn-primary"> Go Back </a>
<?php
	require_once('view-comp/footer.php');
?>