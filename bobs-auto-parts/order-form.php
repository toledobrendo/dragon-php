<?php
	require_once('view-comp/header.php');
	require_once('objects/product-objects.php');
?>

	<h3 class="card-title"> Order Form </h3>

		<form action="process-order.php" method="POST">
			<table class="table">
				<thead>
					<tr class="row">
						<th class="col-4"> Item </th>
						<th class="col-3"> Price </th>
						<th class="col-5"> Quantity </th>
					</tr>
				</thead>

				<tbody>

					<?php 

						foreach($items as $item) {
							echo '<tr class="row">';
							echo '<td class="col-4">'.$item->__get('item').'</td>';
							echo '<td class="col-3">'.$item->__get('price').'</td>';
							echo '<td class="col-5"> <input type="number" name="'.$item->__get('name').'" max="10" min="0" maxLength="3" class="form-control"> </th>';
							echo '</tr>';
						}

					?>
			
					<tr class="row">
						<th class="col-4"> How did you find Bob's </th>
							<td class="col-3"> </td>
							<td class="col-5"> 
							<select name="find" class="custom-select">
								<option value="regular"> I am a regular customer </option>
								<option value="tv"> TV advertising </option>
								<option value="phone"> Phone Directory </option>
								<option value="word"> Word of Mouth </option>
							</select>
						</td>
					</tr>	

					<tr class="row">
						<td class="col-6"> <a href="freight-cost.php" class="btn btn-secondary float-left"> Freight Cost </a>
						<td colspan="2" class="col-6"> <button type="submit" class="btn btn-primary float-right"> SUBMIT </button> </td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
	</div>
	</div>


<?php
	require_once('view-comp/footer.php');
?>