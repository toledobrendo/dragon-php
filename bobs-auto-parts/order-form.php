<!DOCTYPE html>
<?php 
require_once('view-comp/header.php');
require_once('model/Tires.php');
require_once('model/Oil.php');
require_once('model/Spark.php');
?>

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

			$tires = new Tires();
			$oil = new Oil();
			$spark = new Spark();

			$products = array($tires, $oil, $spark);

			foreach($products as $product) {
				echo '<tr class="row">';
				echo '<td class="col-5">'.$product->__get('name').'</td>';
				echo '<td class="col-2">
				<input type="number" name="'.$product->__get('qtyId').'" value="0" maxlength="3" min="0" class="form-control">
				</td>';
				echo '<td class="col-2">'
				.$product->__get('price').
				'</td>';
				echo '</tr>';				
			}

			// $items = array(
			// 	array('Description' => 'Tires', 'Price' => 100, 'QtyID' => 'tireQty'),
			// 	array('Description' => 'Oil', 'Price' => 50, 'QtyID' => 'oilQty'),
			// 	array('Description' => 'Spark Plugs', 'Price' => 30, 'QtyID' => 'sparkQty')
			// );

			// foreach($items as $item) {
			// 	echo '<tr class="row">';
			// 	echo '<td class="col-5">'.$item['Description'].'</td>';
			// 	echo '<td class="col-2">
			// 	<input type="number" name="'.$item['QtyID'].'" value="0" maxlength="3" min="0" class="form-control">
			// 	</td>';
			// 	echo '<td class="col-2">'
			// 	.$item['Price'].
			// 	'</td>';
			// 	echo '</tr>';
			// }

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