<!DOCTYPE html>
<html>
<head>
	<title>
		Fibonacci Sequence
	</title>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="card">
			<div class="card-body">
				<form action="fibonacci-sequence.php" method="post">
				<table class="table">
					<thead>
						<h1 class="card-title">Fibonacci Sequence!</h1>
					</thead>
					<tbody>
						<tr class="row">
							<td class="col-5"><h4> Enter a Length </h4></td>
							<td class="col-4"><input class="form control" type="number" name="fibo-length" min="0"></td>
							<td class="col-3"><button type="submit" class="btn btn-primary submit float-right" name="button">Submit</button></td>
						</tr>
					</tbody>
				</table>
			</form>

				<?php
					$fiboLength = @($_POST['fibo-length']) ? $_POST['fibo-length'] : 0;
					echo 'Sequence Length: ' .$fiboLength. '</br>';

					$first_num = 0;
					$second_num = 1;
		
					$iteration = 1;
		
					while($iteration <= $fiboLength)
					{
						echo (' ' .$first_num);
						$fib = $first_num + $second_num;
						$first_num = $second_num;
						$second_num = $fib;
						$iteration++;
					}
				?>
			</div>
		</div>
	</div>

</body>
</html>