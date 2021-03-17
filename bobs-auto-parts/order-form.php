<?php
	require_once('view-comp/header.php');
?>
				<h3 class="card-title">Order Form</h3>
				<form action="process-order.php" method="POST">
					<table class="table">
						<thead>
							<tr class="row">
								<th class="col-5">Item</th>
								<th class="col-3">Price</th>
								<th class="col-4">Quantity</th>	
							</tr>
						</thead>
						<tbody>
							<!-- <tr class="row">
								<td class="col-5">Tires</td>
								<td class="col-4">
									<input type="number" name="tireQty" maxlength="3" min="0" class="form-control">
								</td>
							</tr>
							<tr class="row">
								<td class="col-5">Oil</td>
								<td class="col-4">
									<input type="number" name="oilQty" maxlength="3" min="0" class="form-control">
								</td>
							</tr>
							<tr class="row">
								<td class="col-5">Spark Plugs</td>
								<td class="col-4">
									<input type="number" name="sparkQty" maxlength="3" min="0" class="form-control">
								</td>
							</tr> -->
							
							<?php
								
								$items = array(
			        				array('itemName' => 'Oil', 'qty' => 'oilQty', 'price' => 50),
			        				array('itemName' => 'Tires', 'qty' => 'tireQty', 'price' => 100),
			        				array('itemName' => 'Spark Plugs', 'qty' => 'sparkQty', 'price' => 30)
			        			);

			        			function compareItems($first, $second){
						        	if($first['price'] == $second['price']){
						        		return 0;
						        	} else if($first['price'] > $second['price']){
						        		return -1;
						        	} else{
						        		return 1;
						        	}
						        }
						        usort($items, 'compareItems');

						        foreach ($items as $item) {
						        	echo '<tr class = "row">
						        		<td class="col-5">'.$item['itemName'].'</td>
						        		<td class="col-3">'.$item['price'].'</td>
						        		<td class="col-4">
						        			<input type="number" name="'.$item['qty'].'" maxlength="3" min="0" class="form-control">
						        		</td>
						        	</tr>';
						        }
						       
							?>

							<tr class="row">
								<td class="col-5">How did you find Bob's?</td>
								<td class="col-7">
									<select name="find" class="custom-select">
										<option value="regular">I'm a regular customer</option>
										<option value="tv"> TV Advertising</option>
										<option value="phone">Phone Directory</option>
										<option value="mouth">Word of mouth</option>
									</select>
								</td>
							</tr>

							<tr class="row">
								<td colspan="2" class="col-12">
									<a href="../index.php" class="btn btn-danger float-right">Go Back</a>
									<button type="submit" class="btn btn-primary float-right">Submit</button>
								</td>
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