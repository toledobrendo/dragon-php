<?php
	require_once('view-comp/header.php');
?>

<h1>Price List</h1>

<?php
echo '</p>Products</p>';

$products = array('Tires', 'Oil', 'Spark Plugs');

echo '</p>Product 0: '.$products[0];

					sort($products); //ascending
					//rsort - reverse

					echo '<ul>';
					//count - to know array size
					for($ctr = 0; $ctr < count($products); $ctr++){
						echo '<li>'. $products[$ctr]. '</li>';
					} 
					echo '</ul>';


					echo '<ul>';
					$ctr = 0;
					//foreach ([array] as [container of current index/element])
					foreach($products as $product){
						echo '<li>'. $ctr.' - '. $product. '</li>';
						$ctr++;
					}
					echo '</ul>';

					echo '<ul>';
					$ctr = 0;
					//foreach - changing values
					foreach($products as $product){
						$product .= ' -1';
						echo '<li>'. $ctr.' - '. $product. '</li>';
						$ctr++;
					}
					echo '</ul>';

					//range
					$numbers = range(1,10); //start, end, gap
					echo '<br/>range(1,10): ';
					foreach ($numbers as $number) {
						echo $number.' ';
					}
					echo '<br/>';

					$letters = range('a','z');
					echo '<br/>range(1,10): ';
					foreach ($letters as $letter) {
						echo $letter.' ';
					}
					echo '<br/>';

					//associative array
					$prices = array('Tires' => 100, 'Oil' => 20, 'Spark Plugs' => 5); //key => value

					//access elements
					$prices['Tires'] = 120; 
					echo '<br/>Tire price: '. $prices['Tires'];

					//add elements
					$prices['Clutch Disk'] = 250;
					echo '<br/>Clutch Disk: '. $prices['Clutch Disk'];

					ksort($prices); //by key
					// krsort - key reverse 
					// asort - by value
					// asort - value reverse

					echo '<ul>';
					foreach ($prices as $itemDesc => $price) {
						echo '<li>'. $itemDesc. " - ". $price;
					}
					echo '</ul>';

					//multidimensional array
					$items = array (
						array('Code' => 'OIL', 'Description' => 'Oil', 'Price' => 10),
						array('Code' => 'TIR', 'Description' => 'Tires', 'Price' => 100),
						array('Code' => 'SPK', 'Description' => 'Spark Plugs', 'Price' => 5)
					);

					echo '<p>'. $items[1]['Description']; //outer before inner

					echo '<table class="table table-condensed">
					<thead>
					<tr>
					<th>Code</th>
					<th>Description</th>
					<th>Price</th>
					</thead>';

					//sort ascending
					function compareItems($fir, $sec){
						if ($fir['Price'] == $sec['Price']) {
							return 0;
						} else if ($fir['Price'] > $sec['Price']){
							return 1;
						} else{
							return -1;
						}
					}

					usort($items, 'compareItems'); //array, function

					foreach($items as $item){
						echo '<tr>';
						foreach ($item as $value) {
							echo '<td>'. $value. '</td>';
						}
						echo '</tr>';
					}
					echo '</table>';

					?>
				</div>
			</div>

<?php
	require_once('view-comp/footer.php');
?>