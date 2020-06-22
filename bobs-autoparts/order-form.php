<?php
	// array of product objects
	require_once('data/product.php');

	$partsArray = array(
			array('id' => 'tir', 'name' => 'Tire', 'price' => 10),
			array('id' => 'oil', 'name' => 'Oil', 'price' => 100),
			array('id' => 'skp', 'name' => 'Spark Plug', 'price' => 5)
		);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Bob's Auto Parts - Order Form</title>

	<?php require_once('view-comp/head-links.php'); ?>
	
</head>
<body>
	<?php
		require_once('view-comp/nav.php');
	?>

	<div class="container">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title"></h3>
				<form class="container "action="process-order.php" method="POST">
					<h1>Bob's Auto Parts - Ordering System</h1>
					<table class="table">
						<thead class="thead-dark">
							<tr>
								<th>Item Code</th>
								<th>Price</th>
								<th>Quantity</th>
							</tr>
							
						</thead>

						<tbody>

							<?php
								foreach ($partsObject as $part) {
									echo '<tr>';

									echo '<td>';
									echo $part->name;
									echo '</td>';

									echo '<td>';
									echo $part->price;
									echo '</td>';

									echo '<td>';									
									echo '<input class="form-control" min="0" type="number" name="' . $part->id . 'Qty' . '">';
									echo '</td>';

									echo '</tr>';
								}

							?>
							
						</tbody>
					</table>

					<button class="btn btn-info float-right" type="submit">Submit</button>
				</form>
				
			</div>
		</div>
	</div>

	<?php
		require_once('view-comp/footer.php');
	?>

	<?php
		require_once('view-comp/dependencies.php');
	?>
	
</body>
</html>