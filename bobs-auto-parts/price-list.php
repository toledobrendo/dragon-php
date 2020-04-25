<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<div class="card">
				<div class="card-body">
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
		</div>
		

		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	</body>
</html>