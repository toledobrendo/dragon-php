<?php 
	require_once('view-comp/bobs-header.php');
	require_once('objects/objects.php')
?>

<h1> Price List </h1>

<?php 
	echo '<p><i>Available Products</i></p>';

	// sort($products); - normal sort
	// rsort($products); - reverse sort

	echo '<ul>';

	// for($ctr = 0; $ctr < count($products); $ctr++) {
	// 	echo '<li>'.$products[$ctr].'</li>';
	// }

	foreach($items as $item) {
		echo '<li>'.$item->__get('item').'</li>';
	}

	echo '</ul>';

	$numbers = range(1, 10);
	echo '<b>Range(1, 10):</b> ';

	foreach($numbers as $number) {
		echo ' '.$number.' ';
	}

	echo'<br/>';

	// ksort($prices); - key sort (asc)
	// krsort($prices); - reverse key sort (desc)
	// asort($prices); - value sort (asc)
	// arsort($prices); - reverse value sort (desc)

	echo '<br/><i>Tire Price:</i> '.$items[0]->__get('price').'<br/>';
	echo '<i>Oil Price:</i> '.$items[1]->__get('price').'<br/>';
	echo '<i>Spark Plug Price:</i> '.$items[2]->__get('price').'<br/>';


	function compareItems($fir, $sec) { // ascending order

		if($fir->__get('price') == $sec->__get('price')) {
			return 0;
		} else if($fir->__get('price') >= $sec->__get('price')) {
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

					echo '<td class="col-2">'.$item->__get('code').'</td>';
					echo '<td class="col-2">'.$item->__get('item').'</td>';
					echo '<td class="col-2">'.$item->__get('price').'</td>';

					echo '</tr>';

				}
						
	echo '</tbody>';
	echo '</table>';

?>
	
</div>
</div>
</div>

<?php 
	require_once('view-comp/bobs-footer.php');
?>