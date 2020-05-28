<!DOCTYPE html>
<html>
<head>
	<title>Ordering Form</title>
</head>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<body>
  <div class="container">
    <div class="card">
			<div class="card-body">
				<h3 class="card-title"> Order Form </h3>
        <form action="process-order.php" method="post">
          <table class="table">
            <thead>
              <tr class="row">
                <th class="col-5"> Item </th>
                <th class="col-7"> Description </th>
              </tr>
            </thead>
            <tbody>
              <tr class="row">
                <td class="col-5">Tires </td>
								<td class="col-7"><input type="number" name="tireQty" maxlength="3" min="0" max="10" class="form-control"/> </td>
							</tr>
							<tr class="row">
                <td class="col-5">Oil </td>
								<td class="col-7"><input type="number" name="oilQty" maxlength="3" min="0" max="10" class="form-control"/> </td>
							</tr>
							<tr class="row">
                <td class="col-5">Spark Plugs </td>
								<td class="col-7"><input type="number" name="sparkQty" maxlength="3" min="0" max="10" class="form-control"/> </td>
							</tr>
							<tr class="row">
								<td class="col-5">How Did Your Hear About Us? </td>
								<td class="col-7">
									<select name="find" class="custom-select">
                        <option value="regular">I'm a regular customer</option>
                        <option value="tv">TV advertising</option>
                        <option value="phone">Phone Directory</option>
                        <option value="mouth">Word of mouth</option>
											</select>
								</td>
							</tr>
							<tr class="row">
								<td colspan="2" class="col-12">
									<a href="freight-cost.php" class="btn btn-secondary float-right">Freight Cost</a>
									<button type="submit" class="btn btn-primary float-right">Submit</button>
								</td>
							</tr>
							<tr class="row">
								<td colspan="2" class="col-12">
									<div class="card-footer">
				          <a class="btn btn-info" href="index.php">Go Back</a>
				        </div>
							</td>
							</tr>
            </tbody>
					</table>
        </form>
			</div>
		</div>
  </div>

</body>

</html>
