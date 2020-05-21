<html>

<head>
	<title> Caesar Shift </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

	<div class="container">
		<div class ="card">
			<div class="card-body">

				<h3 class="card-title"> Caesar Shift </h3>

				<br>

				<form action="caesar-shift.php" method="POST">

				<p> <b> Message </b>
				<input type="text" name="message" class="form-control col-10" value = <?php echo $_POST['message'] ?> > </p> <br/>

				<p> <b> Key </b>
				<input type="number" name="key" min="0" class="form-control col-10" value = <?php echo $_POST['key'] ?> > </p> <br/>

				<button type="submit" class="btn btn-primary float-left"> ENCRYPT MESSAGE </button> <br/> <br/> <br/>

				<?php
                    // Note: Initially have warnings all over the place
                    // Empty key yields a warning
					$key = $_POST['key'];

					$message = strtoupper($_POST['message']);

					$letters = str_split($message); 
					$length = strlen($message);

					function encryptMessage($letters, $length, $key){

						for ($i = 0; $i < $length; $i++) 
						{
							if(ord($letters[$i]) >=65 && ord($letters[$i]) <= 90) {
								$result = chr((ord($letters[$i]) + $key - 65) % 26 + 65);
								echo $result;
							}

							else {
								echo $letters[$i];
							}
						}

					}

					echo '<i>Message: </i>'.$message.'<br/>';
					echo '<i>Chosen Key: </i>'.$key.'<br/>';
					echo '<i>Encypted Message: </i>';
					encryptMessage($letters, $length, $key);

				?>

			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>