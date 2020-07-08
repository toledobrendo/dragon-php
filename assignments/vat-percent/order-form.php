<?php
	require_once('view-comp/header.php');
	require_once('model/product-details.php');
?>
			
				<h3 class="card-title"> Order Form </h3>
				<form action="process-order.php" method="post">
				<table class="table">
				<thead>
					<tr class="row">
						<td class="col-5"><b>Item</b></td>
						<td class="col-4"><b>Price</b></td>
						<th class="col-2"><b>Quantity</b></th>
					
					</tr>
				</thead>

				<tbody>
					<?php
						$products=array(
							array('desc'=>'Tires','name' =>'tireQty', 'price'=>100),
							array('desc'=>'Oil','name' =>'oilQty','price'=>50),
							array('desc'=>'Spark Plugs','name' =>'sparkQty','price'=>30),

						);
							foreach ($products as $product) {
								echo '<tr class="row">
								<td class="col-5">'.$product[
								'desc'].'</td>

								<td class="col-2">'.$product['price'].'</td>
								<td class="col-4">
									<input type="text" name="'.$product['name'].'" maxlengths"3" class="form-control">
								</td>
								
								</tr>';
								}
						?>

					<tr class="row">
								<th class="col-5">How did you find Bob's?</th>
								<td class="col-7" colspan="2">
									<select name="find" class="custom-select">
									<option value="regular">I'm a regular costumer</option>
									<option value="tv-advertising">TV Advertising</option>	
									<option value="phone-directory">Phone Directory</option>
									<option value="word-of-mouth">Word of Mouth</option>
									</select>
								</td>
							</tr>
						</tbody>
						<tfoot>
							<tr class="row">
								<td colspan="3" class="col-12"> 
								<button type="submit" class="btn btn-primary float-right" > 
								SUBMIT </button> &nbsp
								<a href="/dragon-php/bobs-auto-parts/freight-cost.php" class="btn btn-secondary float-right">Freight cost</a>
								</td>
							</tr>
						</tfoot>
					</table>
				</form>
				
<?php
	require_once('view-comp/footer.php');
?>
			