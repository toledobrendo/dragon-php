<?php
	require_once('view-comp/header.php');
?>
				<h1>Price List</h1>
				<?php 
					echo '<p>Products</p>';

					$products = array('Tires', 'Oil', 'Spark Plugs');

					echo '<p>Product 0: '.$products[0];

					echo '<ul>';
					for ($ctr=0; $ctr < count($products); $ctr++) { 
						echo '<li>'.$products[$ctr].'</li>';
					}
					echo '</ul>';

					echo '<ul>';
					$ctr = 0;
					//ampersand for passing by reference, directly changing value
					foreach ($products as &$product) {
						$product = $product.' - 1';
					 	echo '<li>'.$ctr.' - '.$product. '</li>';
					 	$ctr++;
					 }
					echo '</ul>';

					echo '<ul>';
					for ($ctr=0; $ctr < count($products); $ctr++) { 
						echo '<li>'.$products[$ctr].'</li>';
					}
					echo '</ul>';

					//range (start, end, steps)
					$numbers = range(1, 10, 2);
					echo'<br/>Numbers 1 - 10: ';
					foreach ($numbers as $number) {
						echo $number.', ';
					}
					echo '<br/>';

					$letters = range('a', 'z');
					echo'<br/>Letters: ';
					foreach ($letters as $letter) {
						echo $letter.' ';
					}
					echo '<br/>';

					$prices = array('Tires' => 100, 'Oil' => 50, 'Spark Plugs' => 30, 1000);

					$prices['Tires'] = 120;
					echo 'Tire Price: '.$prices['Tires'];

					echo '<br/>Fourth Price: '.$prices[0]; //index 0 is set at the no key value

					$prices['Clutch Disk'] = 250;
					echo '<br/>Clutch Disk: '.$prices['Clutch Disk'];

					ksort($prices); //sorting by key
					krsort($prices); //reverse ksort
					asort($prices); //sorting by value
					arsort($prices); //reverse asort

					echo '<ul>';
					foreach($prices as $itemDesc => $price) {
						echo '<li>'.$itemDesc.' - '.$price.'</li>';
					}
			        echo '</ul>';

			        $empty = array();

			        $items = array(
			        				array('Code' => 'OIL', 'Description' => 'Oil', 'Price' => 50),
			        				array('Code' => 'TIR', 'Description' => 'Tires', 'Price' => 100),
			        				array('Code' => 'SPK', 'Description' => 'Spark Plugs', 'Price' => 30)
			        			);

			        echo '<p>'.$items[1]['Description'];

			        function compareItems($first, $second){
			        	if($first['Price'] == $second['Price']){
			        		return 0;
			        	} else if($first['Price'] > $second['Price']){
			        		return 1;
			        	} else{
			        		return -1;
			        	}
			        }

			        usort($items, 'compareItems');

			        echo '<table class="table table-condensed">
			        		<thead>
			        			<tr>
			        				<th>Code</th>
			        				<th>Description</th>
			        				<th>Price</th>
			        			</tr>
			        		</thead>';

					foreach ($items as $item) {
						echo '<tr>';

						foreach ($item as $value) {
							echo '<td>'.$value.'</td>';	
						}
						echo '</tr>';
					}
					echo '</table>';
				?>
				<tr class="row">
					<td colspan="2" class="col-12">
						<a href="order-form.php" class="btn btn-danger float-right">Go Back</a>
					</td>
				</tr>
<?php
	require_once('view-comp/footer.php');
?>