<html>

<head>
	<title> Bob's Auto Parts </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet"
		href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
		crossorigin="anonymous">
</head>
<body>

	<div class = "container">
		<div class = "card">
			<div class = "card-body">

				<!--start-->
				<h1>Price List</h1>
				<?php
					echo '</p>Products</p>';

          //array of strings, how to access it
          $products = array('Tires','Oil','Spark Plugs');

          echo '</p>Product 0: '.$products[0];

					//sorting sort($array) ascending
					sort($products);
					//descending
					rsort($products);



          //get list from index, use count() to know the index of the array
					echo '<ul>';
						for($ctr = 0; $ctr < count($products); $ctr++){
							echo '<li>'.$products[$ctr].'</li>';
						}
					echo '</ul>';

					//foreach loop
					echo '<ul>';
						$ctr = 0;
						foreach($products as &$product){
							$product = $product.' - 1';
							echo '<li>'.$ctr.' - '.$product.'</li>';
							$ctr++;
						}
					echo '</ul>';
					// need to add & to have pointer pass by reference to retain new value
					echo '<ul>';
						for($ctr = 0; $ctr < count($products); $ctr++){
							echo '<li>'.$products[$ctr].'</li>';
						}
					echo '</ul>';
					//range(starting, how many steps, adding by) can be with 3 parameters
					$numbers = range(1,10);
					echo '<br/> range(1,10): ';
					foreach($numbers as $number){
						echo $number. ' ';
					}
					echo '<br/>';

					$letters = range('a','z');
					echo '<br/> range(\'a\',\'z\'): ';
					foreach($letters as $letter){
						echo $letter. ' ';
					}
					echo '<br/>';

					//array as a hashmap $var = (key=>value, key=>value)
					$prices = array('Tires'=>100,'Oil'=>20,'Spark Plugs'=>5,1000);

					$prices['Tires']=120;
					echo 'Tire price: '.$prices['Tires'];
					//to print the 1000 without a value
					echo '<br/>Without a value: '.$prices[0];

					//to add a new key value to the array
					$prices['Clutch Disk'] = 250;
					echo '<br/>Clutch Disk: '.$prices['Clutch Disk'];

					//sorting by sorting the keys
					ksort($prices);
					//descending order
					//krsort($prices);

					//sorting by value is asort($array) ascending
					asort($prices);
					//descending
					arsort($prices);


					//doing a foreach loop echo listing all values only
					//adding $itemDesc => will list out the keys
					echo '<ul>';
						foreach($prices as  $itemDesc => $price){
							echo '<li>'.$itemDesc.' - '.$price.'</li>';
						}
					echo '</ul>';

					//creating an empty array
					$empty = array();

					//multi dimensional arrays
					$items = 	array(
						array('Code'=>'OIL','DESCRIPTION'=>'Oil','Price'=>10),
						array('Code'=>'TIR','DESCRIPTION'=>'Tires','Price'=>100),
						array('Code'=>'SPK','DESCRIPTION'=>'Spark Plugs','Price'=>5)
					);

					// accessing one element 'Tires'
					echo '<p>'.$items[1]['DESCRIPTION'].'</p>';

					function compareItems($fir, $sec){
						if($fir['Price']==$sec['Price']){
							return 0;
						}else if($fir['Price']>$sec['Price']){
							return 1;
						}else{
							return -1;//ascending, to descending change values of 1 and -1
						}
					}

					// passing value of compareItems to usort
					usort($items, 'compareItems');


					echo '<table class = "table table-condensed">
						<thead>
							<tr>
								<th>Code</th>
								<th>Description</th>
								<th>Price</th>
							</tr>
						</thead>';
					foreach($items as $item){
						echo '<tr>';
						foreach($item as $field => $value){
							echo '<td>'.$value.'</td>';
						}
						echo '</tr>';
					}
					echo '</table>';

				?>
				<!--end-->

			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
		integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
		integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
		crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
		integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
		crossorigin="anonymous"></script>
</body>

</html>
