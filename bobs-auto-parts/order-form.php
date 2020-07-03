<?php
	require_once 'view-comp/header.php';
?>
	
				<h3 class="card-title">Order Form</h3>
					<form action="order-process.php" method="post">
						<table class="table">
							<thead>
								<tr class="row">
									<th class="col-9">Item</th>
								</tr>
							</thead>
							<tbody>
				<?php
					require'classes/product.php';
					session_start();
					$tire = new Product('Tire', 100);
					$oil = new Product('Oil', 100);
					$spark = new Product('Spark', 100);
					// $product = array(
					// 	array('Code' => 'OIL',
					// 		'Description' => 'Oil',
					// 		'Price' => 10),
					// 	array('Code' => 'TIRE',
					// 		'Description' => 'Tire',
					// 	array('Code' => 'SPARK',
					// 		'Description' => 'Spark',
					// 		'Price' => 5)
					// );
					$_SESSION['tire'] = $tire;
					$_SESSION['oil'] = $oil;
					$_SESSION['spark'] = $spark;

					echo "
						<tr class=\"row\">
							<td class=\"col-5\">".$tire->__get('name')."<span class=\"col-1\" required>&#8369;".$tire->__get('price')."<span></td>
							<td class=\"col-4\">
								<input type=\"number\" name=\"tireQty\" maxlength=\"3\" min=\"0\" max=\"10\" form-control>
							</td>
						</tr>
						<tr class=\"row\">
							<td class=\"col-5\">".$oil->__get('name')."<span class=\"col-1\" required>&#8369;".$oil->__get('price')."</span></td>
							<td class=\"col-4\">
								<input type=\"number\" name=\"oilQty\" maxlength=\"3\" min=\"0\" max=\"10\" form-control>
							</td>
						</tr>
						<tr class=\"row\">
							<td class=\"col-5\">".$spark->__get('name')."<span class=\"col-1\" required>&#8369;".$spark->__get('price')."</span></td>
							<td class=\"col-4\">
								<input type=\"number\" name=\"sparkQty\" maxlength=\"3\" min=\"0\" max=\"10\" form-control>
							</td>
						</tr>
						<tr class=\"row\">
							<td class=\"col-5\">How did you find Bob's</td>
							<td class=\"col-4\">
								<select name=\"find\" form-control>
									<option value=\"regular\">I am a Regular Customer</option>
									<option value=\"tv\">TV advertising</option>
									<option value=\"phone\">Phone directory</option>
									<option value=\"mouth\">Word of Mouth</option>
								</select>
							</td>
						</tr>
						<tr class=\"row\">
							<td colspan=\"2\" class=\"col-9\">
								<button type=\"submit\" class=\"btn btn-primary float-right\">Submit</button>
							</td>
						</tr>
					";?></tbody>
				</table>
			</form>
<?php 
	require_once 'view-comp/footer.php';
?>