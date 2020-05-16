<!DOCTYPE html>
<?php 
	require_once('view-comp/header.php');
	require_once('model/Tires.php');
	require_once('model/Oil.php');
	require_once('model/Spark.php');
?>

<h1>Freight Cost</h1>
<table class="table">
	<thead>
		<tr class="row">
			<th class="col-3">Distance</th>
			<th class="col-3">Cost</th>
		</tr>
	</thead>

	<tbody>
		<?php 
			$distance = 50;

						 			// up to 250
			while($distance <= 250) {
				echo 
				'<tr class="row">
				<td class="col-3">'.$distance.'</td>
				<td class="col-3">'.($distance / 10).'</td>
				</tr>';
				$distance += 50;
			}

						 			// 300 to 500
			for($distance = 300; $distance <= 500; $distance += 50) {
				echo 
				'<tr class="row">
				<td class="col-3">'.$distance.'</td>
				<td class="col-3">'.($distance / 10).'</td>
				</tr>';
				$distance += 50;
			}

						 			// past 500
			$distance = 550;
			do {
				echo 
				'<tr class="row">
				<td class="col-3">'.$distance.'</td>
				<td class="col-3">'.($distance / 10).'</td>
				</tr>';
				$distance += 50;
			} while($distance <= 750)
		?>
		<tr class="col-3">
			<a href="order-form.php" class="btn btn-danger">Back</a>
		</tr>
	</tbody>
</table>

<?php 
	require_once('view-comp/footer.php');
?>
