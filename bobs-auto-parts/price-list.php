<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"></script>
  </head>
    
  <body>
    <!-- hello-world.php or hello_world.php -->
    <div class="container">
        <div class="card">
            <div class="card-body">
				<h1>Price List</h1>
					<?php 
						echo '<p>Products</p>';

						$products = array('Tires', 'Oil', 'Spark Plugs');

						echo '<p>Product 0: '.$products[0].'</p>';

						// sorting
						sort($products);  // ascending
						rsort($products); // descending

						// for loop
						echo '<ul>';
						for($ctr = 0; $ctr < count($products); $ctr++) {
							echo '<li>'.$products[$ctr].'</li>';
						}
						echo '</ul>';

						// for each
						echo '<ul>';
						foreach($products as $product) {
							echo '<li>'.$product.'</li>';
						}
						echo '</ul>';

						// range(start, max, step)
						$numbers = range(1, 10, 0.8);
						echo '<br/>range (1, 10, 0.8):';
						foreach($numbers as $number) {
							echo ' '.$number;
						}

						$letters = range('a', 'z');
						echo '<br/>range (\'a\', \'z\'):';
						foreach($letters as $letter) {
							echo ' '.$letter;
						}
						
						// -----------------------------------

						// prices
						$prices = array('Tires' => 100, 'Oil' => 50, 'Spark Plugs' => 30,);

						// sort by key
						ksort($prices);  // ascending
						krsort($prices); // descending
						// sort by value
						asort($prices);  // ascending
						arsort($prices); // descending

						$prices['Tires'] = 120;	// assign new value
						echo '<br/>Tire price: '.$prices['Tires'];
						echo '<br/>Oil price: '.$prices['Oil'];
						echo '<br/>Spark Plugs price: '.$prices['Spark Plugs'];

						$prices['Clutch Disk'] = 250; // add an element: arrays in php dont have limits unlike conventional arrays

						echo '<ul>';
						foreach($prices as $itemDesc => $price) { // foreach the key-value array
							echo '<li>'.$itemDesc.' - '.$price.'</li>';
						}
						echo '</ul>';

						// empty array
						$empty = array();

						// -----------------------------------

						$items = array(
							array('Code' => 'TIR', 'Description' => 'Tires', 'Price' => 100),
							array('Code' => 'OIL', 'Description' => 'Oil', 'Price' => 50),
							array('Code' => 'SPK', 'Description' => 'Spark Plugs', 'Price' => 30)
						);

						// custom sorting function (ascending)
						function compareItems($first, $second) {
							if($first['Price'] == $second['Price']) {
								return 0;
							} else if($first['Price'] > $second['Price']) {
								return 1;
							} else {
								return -1;
							}
						}

						// method called to utilize custom sorting functions
						usort($items, 'compareItems');

						echo '<table class="table table-condensed">
								<thead>
									<tr>
										<th>Code</th>
										<th><Description</th>
										<th>Price</th>
									</tr>

								</thead>';
                
						foreach($items as $item) {
							echo '<tr>';
							foreach($item as $field => $value) {
								echo '<td>'.$value.'</td>';
							}
							echo '</tr>';
						}
						echo '</table>';
					 ?>	
            </div>
        </div>
    </div>
    
  </body>
</html>