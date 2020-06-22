<?php 
	// array of product objects
	require_once('../service/order-service.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Thank you for your purchase.</title>

	<style type="text/css">
		.wrapper {
			padding: 20px;
		}
	</style>

	<?php require_once('view-comp/head-links.php'); ?>
</head>
<body>
	<?php
		require_once('../view-comp/nav.php');
	?>

	<div class="wrapper">
		<div class="container">
			<div class="card">
				<div class="card-body">
					<?php
						getOrders();
					?>
				</div>
			</div>
		</div>
	</div>

	<?php
		require_once('../view-comp/footer.php');
	?>

	<?php
		require_once('../view-comp/dependencies.php');
	?>
	
</body>
</html>