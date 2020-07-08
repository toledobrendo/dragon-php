<?php
	require_once('view-comp/header.php');
?>
			
				<h1>Price List</h1>
				
					<?php
					
					echo '</p> Products </p>';

					$products = array('Tires','Oil','Spark Plugs');

					echo '</p> Product 0: '.$products[0];

					sort($products);
					rsort($products);


					echo '<ul>';
					for ($ctr=0; $ctr < count($products); $ctr++) { 
						echo '<li>'.$products[$ctr];
					}
					echo '</ul>';
					

					echo '<ul>'; //can't track index
					//unless use of counter

					$ctr=0;
					foreach ($products as &$product) {
						$product=$product.'-1';
						echo '<li>'.$ctr.'-'.$product.'</li>';
						$ctr++;
					} //preferential for me way
					echo'</ul>';

					echo '<ul>';
					for ($ctr=0; $ctr < count($products); $ctr++) { 
						echo '<li>'.$products[$ctr];
					}
					echo '</ul>';

					$numbers = range(1, 10, 2);
					echo '</br>range(1,10): ';
					foreach ($numbers as $number) {
						echo $number.' ';
					}

					$letters= range('a', 'z');
					echo '</br>letters:';
					foreach ($letters as $letter) {
						echo $letter.' ';
					}
					//range(minx,max,steps)

					$prices= array('Tires' => 100, 'Oil' => 20, 'Sparkplugs' => 5, 1000);

					echo '</br>Tire Price: '.$prices['Tires'];

					echo '</br>Sparkplugs Price: '.$prices['Oil']; 

					echo '</br>Fourth Price: '.$prices[0]; 	 //not a good practice

					$prices['Clutch Disk'] = 250;

					

					
					//krsort($prices);

					/*by value
					asort($prices);
					arsort($prices);
					*/

					echo '</br>Clutch Disk Price: '.$prices['Clutch Disk'];

					ksort($prices, SORT_STRING);
					echo '<ul>';
					foreach ($prices as $itemDesc=> $price) {
						echo '<li>'.$itemDesc.' - '.$price.'</li>';
					}
					echo '</ul>'; 

					$empty= array();

					$items=array(
							array('Code'=>'OIL','Description' =>'Oil','Price'=>20),
							array('Code'=>'TIR','Description' =>'Tires','Price'=>100),
							array('Code'=>'SPK','Description' =>'Spark Plugs','Price'=>5),
						);

					function compareItems($fir,$sec){
						if ($fir['Price']==$sec['Price']) {
           				return 0;
						} else if($fir['Price']>$sec['Price']){
						return -1;
						}	else {
							return 1; //asecending order

							//if you want descending order make it return 0, -1,1
						}
					}
					echo '<p>'.$items[1]['Description'];
					usort($items, 'compareItems');
					

					echo '<table class="table table-condensed">
						<thead>
						<tr>
							<th>Code</th>
							<th>Description</th>
							<th>Price</th>
						</tr>';
					foreach ($items as $item){
						echo '<tr>';
						foreach ($item as $value) {
							echo '<td>'.$value.'</td>';
						}
						echo '</tr>';
					}
					echo '</table>';

				?>
				
<?php
	require_once('view-comp/footer.php');
?>