<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container">
			<div class="card">
				<div class="card-body">
					<h1>Caesar Shift</h1>
					<form method="POST">
						<table class="table">
							<thead>
								<tr class="row">
									<td class="col-2"><p>Message</p></td>
									<td class="col-6"><input type="text" class="form-control" name="message" required></td>
								</tr>
								<tr class="row">
									<td class="col-2"><p>Key</p></td>
									<td class="col-6"><input type="number" class="form-control" min="0" name="key" required></td>
								</tr>
								<tr class="row">
									<td class="col-8"><button type="submit" class="btn btn-primary">Submit</button></td>
								</tr>
							</thead>
						</table>
					</form>
					<?php 
						if(isset($_POST['message']) && isset($_POST['key'])) {
							$message = $_POST['message'];
							$key = $_POST['key'];

							$message = strtoupper($message); // uppercase
							$splitMessage = str_split($message); // split string into 1 character each
							$arraySize = count($splitMessage);

							// go through each item in array
							for($letterIndex = 0; $letterIndex < $arraySize; $letterIndex++) {
								// increment up to [key] times
								for($stepCount = 0; $stepCount < $key; $stepCount++) {
									if($splitMessage[$letterIndex] === "Z") {
										$splitMessage[$letterIndex] = "A";
									} else {
										$splitMessage[$letterIndex]++;
									}
								}
							}

							// display encrypted message
							foreach($splitMessage as $encryptedMessage) {
								echo $encryptedMessage;
							}

							$splitMessage = array();
						}
					 ?>	
				</div>
			</div>
		</div>

	    <!-- Optional JavaScript -->
	    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>