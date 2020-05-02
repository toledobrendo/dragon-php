<?php
	require_once('view-comp/header.php');
?>


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


<?php
	require_once('view-comp/footer.php');
?>