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
							<tr class="row">
								<th class="col-6"> Tires </th>
								<th class="col-6"> <input type="number" name="tireQty" max="10" min="0" maxLength="3" class="form-control"> </th>
							</tr>

							<tr class="row">
								<th class="col-6"> Oil </th>
								<th class="col-6"> <input type="number" name="oilQty" max="10" min="0" maxLength="3" class="form-control"> </th>
							</tr>

							<tr class="row">
								<th class="col-6"> Spark Plugs </th>
								<th class="col-6"> <input type="number" name="sparkQty" max="10" min="0" maxLength="3" class="form-control"> </th>
							</tr>

							<tr class="row">
								<td colspan="2" class="col-12"> <button type="submit" class="btn btn-primary float-right" > SUBMIT </button> </td>
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