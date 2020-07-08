<?php
	require_once('view-comp/header.php');
	require_once('service/order-service.php');	
	
?>
			<h1>Order List</h1>
				<?php 
					getOrders();
				?>

<?php
	
	require_once('view-comp/footer.php');
?>			

