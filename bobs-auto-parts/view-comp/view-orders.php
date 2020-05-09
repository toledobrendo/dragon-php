<?php
	require_once('header.php');
	require_once('../service/order-service.php');
?>

	<h1 class="card-title"> Bob's Auto Parts </h1>
	<br>
	<h3 class="card-title"> Order List </h3>

	<?php
		getOrders();
	?>
				

<?php
	require_once('footer.php');
?>