<?php
	@ $sequenceLen = $_GET['sequenceLen'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>H1-Fibonacci</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>
	<div class="container" style="margin-top: 20px">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">Fibonacci Generator</h3>

				<form class="form-row align-items-center" action="fibonacci.php" method="GET">
					<div class="col-auto">
						<label class="form-check-label">Sequence Length: </label>
					</div>

					<div class="col-auto">
						<input class="form-control"  type="number" min="0" name="sequenceLen" <?php echo !empty($sequenceLen) ? 'value="' . $sequenceLen . '"' : '';?>>
					</div>

					<div class="col-auto">
						<button class="btn btn-primary" type="submit">Generate</button>
					</div>

				</form>

				<?php 
					if(!empty($sequenceLen)) {
						$a = 0;
						$b = 0;

						for($i = 0; $i < $sequenceLen; $i++) {
							if($i % 2 == 0) {
								$a += $b;
								echo $a . "&nbsp&nbsp&nbsp&nbsp";
								if($i == 0) {
									$b = 1;
								}
							} else {
								$b += $a;
								echo $b . "&nbsp&nbsp&nbsp&nbsp";
							}
							
						}
					}
					
				 ?>

			</div>
		</div>
	</div>
	
</body>
</html>