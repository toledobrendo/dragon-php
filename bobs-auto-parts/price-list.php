<!DOCTYPE html>
<?php 
	require_once('view-comp/header.php');
	require_once('script.php');
?>

<h1>Price List</h1>

<?php 
	echo '<p>Products</p>';

	//$products = array('Tires', 'Oil', 'Spark Plugs');

	//echo '<p>Product 0: '.$products[0].'</p>';

	// // sorting
	// sort($products);  // ascending
	// rsort($products); // descending

	// // for loop
	// echo '<ul>';
	// for($ctr = 0; $ctr < count($products); $ctr++) {
	// 	echo '<li>'.$products[$ctr].'</li>';
	// }
	// echo '</ul>';

	// // for each
	// echo '<ul>';
	// foreach($products as $product) {
	// 	echo '<li>'.$product.'</li>';
	// }
	// echo '</ul>';

	// // range(start, max, step)
	// $numbers = range(1, 10, 0.8);
	// echo '<br/>range (1, 10, 0.8):';
	// foreach($numbers as $number) {
	// 	echo ' '.$number;
	// }

	// $letters = range('a', 'z');
	// echo '<br/>range (\'a\', \'z\'):';
	// foreach($letters as $letter) {
	// 	echo ' '.$letter;
	// }

	// -----------------------------------

	// prices
	// $prices = array('Tires' => 100, 'Oil' => 50, 'Spark Plugs' => 30,);

	// sort by key
	// ksort($prices);  // ascending
	// krsort($prices); // descending
	// // sort by value
	// asort($prices);  // ascending
	// arsort($prices); // descending

	echo '<br/>Tire price: '.$tires->__get('price');
	echo '<br/>Oil price: '.$oil->__get('price');
	echo '<br/>Spark Plugs price: '.$spark->__get('price');

	// add an element: arrays in php dont have limits unlike conventional arrays
	//$prices['Clutch Disk'] = 250;

	echo '<br/><br/>';
	echo '<ul>';
	foreach($products as $product) { // foreach the key-value array
		echo '<li>'.$product->__get('name').' - '.$product->__get('price').'</li>';
	}
	echo '</ul>';

	// empty array
	$empty = array();

	// -----------------------------------

	// $items = array(
	// 	array('Code' => 'TIR', 'Description' => 'Tires', 'Price' => 100),
	// 	array('Code' => 'OIL', 'Description' => 'Oil', 'Price' => 50),
	// 	array('Code' => 'SPK', 'Description' => 'Spark Plugs', 'Price' => 30)
	// );

	// // custom sorting function (ascending)
	// function compareItems($first, $second) {
	// 	if($first['Price'] == $second['Price']) {
	// 		return 0;
	// 	} else if($first['Price'] > $second['Price']) {
	// 		return 1;
	// 	} else {
	// 		return -1;
	// 	}
	// }
	// // method called to utilize custom sorting functions
	// usort($items, 'compareItems');

	// custom sort function for class
	function compareItems($first, $second) {
		if($first->__get('price') == $second->__get('price')) {
			return 0;
		} else if($first->__get('price') > $second->__get('price')) {
			return 1;
		} else {
			return -1;
		}
	}
	usort($products, 'compareItems');


	echo '<table class="table table-condensed">
	<thead>
	<tr>
	<th>Code</th>
	<th><Description</th>
	<th>Price</th>
	</tr>

	</thead>';

	foreach($products as $product) {
		echo '<tr>';
		echo '<td>'.$product->__get('code').'</td>';
		echo '<td>'.$product->__get('name').'</td>';
		echo '<td>'.$product->__get('price').'</td>';
		echo '</tr>';
	}
	echo '</table>';

	echo '<a href="../index.php" class="btn btn-danger">Back to index</a>';
?>	

<?php 
	require_once('view-comp/footer.php');
?>
