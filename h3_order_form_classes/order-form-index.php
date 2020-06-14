<?php
 require_once 'view/header.php';
// include '../view-comp/header.php';
 ?>

				<h3 class="card-title"> Order Form </h3>
        <form action="process-order-index.php" method="post">
          <table class="table">
            <thead>
              <tr class="row">
                <th class="col-5"> Item </th>
                <th class="col-7"> Description </th>
              </tr>
            </thead>
            <tbody>
              <tr class="row">
                <!-- Note: Array of products missing in this page -->
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
								<td colspan="2" class="col-12">
									<a href="freight-cost.php" class="btn btn-secondary float-right">Freight Cost</a>
									<button type="submit" class="btn btn-primary float-right">Submit</button>
								</td>
							</tr>

            </tbody>
					</table>
        </form>
			</div>
	<?php
   require_once 'view/footer.php';
	// include '../view-comp/footer.php';
	?>
