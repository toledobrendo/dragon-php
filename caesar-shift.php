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
				<h1>Caesar Shift</h1>
				<form method="post" action="caesar-shift.php">
					<p>Message</p>
					<textarea rows="2" class="form-control" name="message"></textarea>
					<p>Key</p>
					<input type="number" name="key" class="form-control">
					<input type="submit" class="btn btn-primary">
					<br><br>
					<?php
						echo "Result: ";
						$message = @($_POST['message']);
						$key = @($_POST['key']);
						$messageArr = str_split($message);
						foreach ($messageArr as $character) {
							if (!ctype_alpha($character)) {
								echo $character;
							} else {
								$character = strtoupper($character);
								echo chr(ord($character) + $key);
							}
						}
					?>
				</form>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>