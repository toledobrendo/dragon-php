<?php
	require_once('service/order-service.php');
	require_once('view-comp/header.php');
?>
				<h1>Order List</h1>
				<?php
					getOrders();
				?>
				<tr class="row">
					<td colspan="2" class="col-12">
						<a href="../index.php" class="btn btn-danger float-right">Go Back</a>
					</td>
				</tr>
<?php
	require_once('view-comp/footer.php');
?>