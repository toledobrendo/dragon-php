<!DOCTYPE html>
<?php 
// constant variables
// define('TIRE_PRICE', 100);
// define('OIL_PRICE', 50);
// define('SPARK_PRICE', 30);
require_once('view-comp/header.php');
?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>

	<h3 class="card-title">Order Form</h3>
	<form action="process-order.php" method="POST">
		<table class="table">
			<thead>
				<tr class="row">
					<th class="col-5">Item</th>
					<th class="col-4">Quantity</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$items = array(
					array('Description' => 'Tires', 'Price' => 100, 'QtyID' => 'tireQty'),
					array('Description' => 'Oil', 'Price' => 50, 'QtyID' => 'oilQty'),
					array('Description' => 'Spark Plugs', 'Price' => 30, 'QtyID' => 'sparkQty')
				);

				foreach($items as $item) {
					echo '<tr class="row">';
					echo '<td class="col-5">'.$item['Description'].'</td>';
					echo '<td class="col-2">
					<input type="number" name="'.$item['QtyID'].'" value="0" maxlength="3" min="0" class="form-control">
					</td>';
					echo '<td class="col-2">'
					.$item['Price'].
					'</td>';
					echo '</tr>';
				}
				?>

				<tr class="row">
					<td class="col-5">How did you find Bob's?</td>
					<td class="col-4">
						<select name="find" class="">
							<option value="regular">I'm a regular customer</option>
							<option value="tv">TV ads</option>
							<option value="phone">Phone directory</option>
							<option value="mouth">Word of the mouth</option>
						</select>
					</td>
				</tr>
				<tr class="row">
					<td colspan="2" class="col-9">
						<a href="freight-cost.php" class="btn btn-secondary">Freight Cost</a>
						<button type="submit" class="btn btn-primary float-right">Submit</button>
					</td>
				</tr>

			</tbody>
		</table>
	</form>

	<?php 
	require_once('view-comp/footer.php');
	?>

</body>
</html>