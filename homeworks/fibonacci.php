<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 	integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	</head>
<body>
	<div class="container">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">Fibonacci Sequence</h3>

				<p>Sequence Length</p>
				
				<form action="" method="post">
					<div class="row">
						<div class="col-11">
							<input type="number" name="sequence" min="1" class="form-control"/>
						</div>

						<div class="col-1">	
							<button name="submit" type="submit" class="btn btn-primary float-right">Submit</button>
						</div>
					</div>
				</form>

				<?php
					echo "Series Length: ";

					if(isset($_POST['submit'])){
						$sequence = $_POST['sequence'] ? $_POST['sequence'] : 0 ;

						echo $sequence. "<br/>";

						$ctr = 0;
						$f1 = 0;
						$f2 = 1;

						if($sequence == 1){
							echo $f1. '&nbsp &nbsp &nbsp &nbsp &nbsp';
						} else{
							echo $f1. '&nbsp &nbsp &nbsp &nbsp &nbsp';
							echo $f2. '&nbsp &nbsp &nbsp &nbsp &nbsp';

							while($ctr < $sequence-2){ 
								$f3 = $f2 + $f1 ;
								echo $f3. '&nbsp &nbsp &nbsp &nbsp &nbsp';
								$f1 = $f2 ;
								$f2 = $f3 ;
								$ctr = $ctr + 1;
							}
						}
					}
				?>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>