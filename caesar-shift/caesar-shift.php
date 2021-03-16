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
				<h3 class="card-title">Caesar Shift</h3>
				<form action="" method="POST" autocomplete="off">
					<table class="table">
						<tbody>
							<tr class="row">
								<p>Message</p>
								<input type="text" name="message" class="form-control">
							</tr>
							<br>
							<tr class="row">
								<p>Key</p>
								<input type="number" name="key" min="0" class="form-control">
							</tr>
							<br>
							<tr class="row">
								<td class="col-12">Result: 
									<?php
										function shiftMessage($message, $key){
											$message = strtoupper($message);
											$letters = str_split($message);
											foreach($letters as &$letter){
												if(ctype_alpha($letter)){
													$letter = chr(ord($letter) + $key);

													if(ord($letter) > 90){
														$letter = chr(ord($letter) - 26);
													}
												}
												echo $letter;
											}
										}
										$message = @($_POST['message']);
										$key = @($_POST['key']);
										shiftMessage($message, $key);
									?>
								</td>
							</tr>
							<tr class="row">
								<td colspan="2" class="col-12">
									<a href="../index.php" class="btn btn-danger float-right">Go Back</a>
									<button type="submit" class="btn btn-primary">Submit</button>
								</td>
							</tr>
						</tbody>
					</table>
				</form>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>