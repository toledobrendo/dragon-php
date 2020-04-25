<html>

<head>
	<title> Price List </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

	<div class="container">
		<div class ="card">
			<div class="card-body">

				<h1> Price List </h1>

				<?php 
					echo '<p><i>Available Products</i></p>';
					$products = array('Tires', 'Oil', 'Spark Plugs');

					// sort($products); - normal sort
					// rsort($products); - reverse sort

					echo '<ul>';

						// for($ctr = 0; $ctr < count($products); $ctr++) {
						// 	echo '<li>'.$products[$ctr].'</li>';
						// }

						foreach($products as $product) {
							echo '<li>'.$product.'</li>';
						}

					echo '</ul>';

					$numbers = range(1, 10);
					echo '<b>Range(1, 10):</b> ';

					foreach($numbers as $number) {
						echo ' '.$number.' ';
					}

					echo'<br/>';

					$prices = array('Tires' => 100, 'Oil' => 10, 'Spark Plugs' => 4);

					// ksort($prices); - key sort (asc)
					// krsort($prices); - reverse key sort (desc)
					// asort($prices); - value sort (asc)
					// arsort($prices); - reverse value sort (desc)

					echo '<br/><i>Tire Price:</i> '.$prices['Tires'].'<br/>';
					echo '<i>Oil Price:</i> '.$prices['Oil'].'<br/>';
					echo '<i>Spark Plug Price:</i> '.$prices['Spark Plugs'].'<br/>';

					$items = array(
								array('Code' => 'OIL', 'Description' => 'Oil', 'Price' => 10),
								array('Code' => 'TIR', 'Description' => 'Tires', 'Price' => 100),
								array('Code' => 'SPK', 'Description' => 'Spark Plugs', 'Price' => 4)
							);

					function compareItems($fir, $sec) { // ascending order

						if($fir['Price'] == $sec['Price']) {
							return 0;
						} else if($fir['Price'] >= $sec['Price']) {
							return 1;
						} else {
							return -1;
						}

					}

					usort($items, 'compareItems');

					echo '<br/>';
					echo '<table class="table table-condensed">

							<thead>
								<tr class="row">
									<th class="col-2"> Code </th>
									<th class="col-2"> Description </th>
									<th class="col-2"> Price </th>
								</tr>
							</thead>

							<tbody>';

							foreach($items as $item) {
								echo '<tr class="row">';

									foreach($item as $value) {
										echo '<td class="col-2">'.$value.'</td>';
									}

								echo '</tr>';
							}
							
					echo '</tbody>';
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