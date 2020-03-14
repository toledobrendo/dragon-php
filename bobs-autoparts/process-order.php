<!DOCTYPE html>
<html>
<head>
	<title>Result</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<style type="text/css">
		.wrapper {
			padding: 20px;
		}
	</style>
</head>
<body>
	<div class="wrapper">
		<div class="container">
		<?php
		echo '<h2>Order Processed at ';
		echo date('H:i, jS F Y');
		echo '</h2>';

		$tireQty = $_POST['tireQty'];
		$oilQty = $_POST['oilQty'];
		$sparkplugQty = $_POST['sparkplugQty'];

		echo '<h5>Your order is:<br></h5>';
		echo $tireQty. '<span> tires/s.</span><br>';
		echo $oilQty. '<span> oil/s.</span><br>';
		echo $sparkplugQty. '<span> sparkplug/s.</span><br>';
	?>
	</div>
	</div>
	
	
</body>
</html>