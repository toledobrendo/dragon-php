<?php 
	require_once('header.php');
	require_once('../service/order-service.php');
?>
					<h1>Order List</h1>

					<?php
						getOrders();
					?>
				</div>
			</div>
<?php
	require_once('../view-comp/footer.php');
?>