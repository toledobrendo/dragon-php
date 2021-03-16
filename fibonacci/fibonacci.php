<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="card">
			<div class="card-body">
				<h1>Fibonacci Sequence</h1>
				<form method="POST">
					<label>Sequence Length</label>
					<input type="number" name="seqLength" min="0">
					<button class="btn btn-primary">Calculate</button>

					<div class="d-flex align-content-between flex-wrap">
						<?php
							$seqLength = @((int)$_POST['seqLength'] ? $_POST['seqLength'] : 0);
							$prev = 0;
							$next = 1;
							$sum = 0;

							for ($i=0; $i < $seqLength; $i++) { 
								echo '<div class="p-3">'.$sum.'</div>';
								$sum = $prev + $next;
								$prev = $next;
								$next = $sum;
							}
						?>
					</div>
				</form>
				<div class="card-footer">
					<a class="btn btn-info float-right" href="../index.php">Go Back</a>
				</div>	
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>