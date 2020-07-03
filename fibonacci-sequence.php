<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="card"> 
			<div class="card-body"> 
				<form action="fibonacci-sequence.php" method="post">
					<h1>Fibonacci Sequence</h1>
					<p>Sequence Length</p>
					<div class="input-group mb-3">
						<input class="form-control"type="number" name="length">
						<div class="input-group-append">
							<input class="btn btn-primary" type="submit">
						</div>
					</div>
					<p>
						Series Length: 
						<?php
							$n1 = 0;
							$n2 = 1;
							$length = @($_POST['length']);
							if (empty($length)) {
								echo " 0<br>";
							} else {
								echo "$length <br>";
								echo "<ul class=\"list-inline\">";
								for ($i=0; $i < $length; $i++) {
									echo "<li class=\"list-inline-item col-sm-1\">$n1</li>";
									$sum = $n1 + $n2;
									$n1 = $n2;
									$n2 = $sum;
								}
								echo "</ul>";
							}
						?>
					</p>
				</form>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>