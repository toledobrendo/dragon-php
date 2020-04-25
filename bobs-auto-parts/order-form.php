<html>

<head>
	<title> Order Form </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

	<div class="container">
		<div class ="card">
			<div class="card-body">
				
				<h3 class="card-title"> Order Form </h3>

				<form action="process-order.php" method="POST">
					<table class="table">
						<thead>
							<tr class="row">
								<th class="col-6"> Item </th>
								<th class="col-6"> Quantity </th>
							</tr>
						</thead>

						<tbody>

							<?php 

								$items = array(
									array('Item' => 'Oil', 'Name' => 'oilQty'),
									array('Item' => 'Tires', 'Name' => 'tireQty'),
									array('Item' => 'Spark Plugs', 'Name' => 'sparkQty')
								);

								foreach($items as $item) {
									echo '<tr class="row">';
									echo '<th class="col-6">'.$item['Item'].'</td>';
									echo '<th class="col-6"> <input type="number" name="'.$item['Name'].'" max="10" min="0" maxLength="3" class="form-control"> </th>';
									echo '</tr>';
								}

							?>
			
							<tr class="row">
								<th class="col-6"> How did you find Bob's </th>
								<th class="col-4"> 
									<select name="find" class="custom-select">
										<option value="regular"> I am a regular customer </option>
										<option value="tv"> TV advertising </option>
										<option value="phone"> Phone Directory </option>
										<option value="word"> Word of Mouth </option>
									</select>
								</th>
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

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>