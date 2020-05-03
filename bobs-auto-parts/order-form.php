<?php
	require_once('view/header.php');
	require_once('model/product.php');
	require_once('model/order.php');
?>
	<h3 class="card-title"> Order Form </h3>

	<form action="process-order.php" method="POST">
		<table class="table">
			<thead>
				<tr class="row">
					<th class="col-4"> Item </th>
					<th class="col-4"> Price </th>
					<th class="col-4"> Quantity </th>
				</tr>
			</thead>

			<tbody>
				<?php
					$orderForm = new Order();

					foreach ($orderForm->products as $item) {
						echo '<tr class="row">';
						echo '<td class="col-4">'.$item->productName.'</td>';
						echo '<td class="col-4">'.$item->productPrice.'</td>';
						echo '<td class="col-4"> <input type="number" name="'.$item->productID.'" max="10" min="0" maxLength="3" class="form-control" value="'.$item->quantity.'"> </td>';
						echo '</tr>';
					}
				?>
				<tr class="row">
					<td class="col-8">How did you find Bob's</td>
					<td class="col-4">
						<select name="find" class="custom-select">
							<option value="regular">I'm a regular customer</option>
							<option value="tv">TV advertising</option>
							<option value="phone">Phone Directory</option>
							<option value="mouth">Word of mouth</option>
						</select>
					</td>
				</tr>
				<tr class="row">
					<td colspan="2" class="col-12"> <button type="submit" class="btn btn-primary float-right" > SUBMIT </button> </td>
				</tr>
			</tbody>
		</table>
	</form>
<?php
	require_once('view/footer.php');
?>
