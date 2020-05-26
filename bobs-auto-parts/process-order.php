<?php
	require_once('view/header.php');
	require_once('model/product.php');
	require_once('model/product-list.php');
	require_once('service/order-service.php');
	require_once('exception/file-not-found.php');
	require_once('service/data-extraction.php');

	define("PROPERTIES_FILE", $_SERVER['DOCUMENT_ROOT']."/dragon/dragon-php/bobs-auto-parts/resource/properties.txt");
	define("VAT_PERCENT", getValueFromFile(PROPERTIES_FILE, "VAT_PERCENT"))

    // Warning: feof() expects parameter 1 to be resource, boolean given in C:\xampp\htdocs\dragon-php\bobs-auto-parts\service\data-extraction.php on line 4
    //
    // Warning: fgets() expects parameter 1 to be resource, boolean given in C:\xampp\htdocs\dragon-php\bobs-auto-parts\service\data-extraction.php on line 5
?>
	<h1 class="card-title"> Bob's Auto Parts </h1>
	<br>
	<h3 class="card-title"> Order Results </h3>

<!-- Note: Better to indent php code -->
	<?php
	$list = new ProductList();

  echo '<p>Order Processed at ';
  echo date('H:i, jS F Y');
	echo '</p>';
	$find = $_POST['find'];

	switch($find) {
		case 'regular':
			echo 'Regular Customer';
			break;
		case 'tv':
			echo 'From TV Advertising';
			break;
		case 'phone':
			echo 'From Phone Directory';
			break;
		case 'mouth':
			echo 'From Word of Mouth';
			break;
		default:
			echo 'Unknown Customer';
			break;
	}
	echo '<p>Your order is as folows</p>';
	$total = 0;
	foreach ($list->products as $item) {
			$quantity = $_POST[$item->productID.'QTY'];
			$item->quantity = $quantity; //im not sure if this will actually save the actual product
			echo $quantity;
			echo ' '.$item->productName.'(s) @ ';
			echo $item->productPrice.' each<br/>';

			$total += $item->productPrice * $_POST[$item->productID.'QTY'];
	}
	echo '<br>';

	$vatable = 0;
	$vat = 0;
	if($total != 0 && VAT_PERCENT != 0) {
		$vatable = $total / (1 + VAT_PERCENT);
		$vat = $total - $vatable;
	}

	echo "VATable Amount: $vatable <br/>";
	echo "VAT Amount (".VAT_PERCENT."): $vat <br/>";
	echo "Total Amount: $total <br/>";

	echo "<br>Amount exceeded 500 but less than 1000? ".(500 < $total ? ($total < 1000 ? 'yes': 'no') : 'no').'<br><br>';

	//gonna save the list
	saveOrder($list);
	?>

	<br>
	<br>

	<a href ="order-form.php" class="btn btn-primary"> Go Back </a>

<?php
	require_once('view/footer.php');
?>
