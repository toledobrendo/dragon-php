<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>
<body>
	<div class="container">
		<div class="card">
			<div class="card-body">
				<h1>Finonacci Sequence</h1>

				<table class="table">
					<tbody>
						<form name="form" action="" method="post">
							<tr class="row">
								<td class="col-5"><b>Sequence Length</b></td>
								<td class="col-5">
									<input type="number" name="seqlength" id="seqlength" min="0" class="form-control"/>	
								</td>
								<td class=:"col-5">
									<button type="submit" class="btn-primary float-right" name="show">Submit</button>
								</td>
								
								<td>
									<?php
										$number = 0; //initial value before button click
										$btnsubmit = @(($_POST['show'])); //Note: Observe camel case on variable names

										if (isset($btnsubmit)) {
											$number = $_POST['seqlength']; //value after click, value changes depending on user input

											echo '<b>Series Length Specified: </b>' .$number.'<br/><br/>';

											function Fibonacci($number) { 
    											if ($number == 0) 
        											return 0;     
    											else if ($number == 1) 
	        										return 1;     
	    										else
	        										return (Fibonacci($number-1) +  Fibonacci($number-2)); 
											}

       		 								for ($counter = 0; $counter < $number; $counter++){   
    											echo Fibonacci($counter),'&emsp;&emsp;'; 
											}
										}
									?>									
								</td>
							</tr>
						</form>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>