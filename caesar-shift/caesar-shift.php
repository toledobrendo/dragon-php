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
        <form action="caesar-shift.php" method="POST" id="caesar">
          <label class="label top-label" for="message"> Message </label><br>
          <textarea class="textarea" name="message" wrap="soft" rows="3" cols="100"></textarea>
          <br>
          <br>
          <label class="label top-label" for="key"> Key </label>
          <input type="number" name="key" min="0" maxLength="3" class="form-control">
          <br>
          <button type="submit" class="btn btn-primary" > Submit </button>
        </form>
				<?php
          $message = @($_POST['message']);
          $key = @($_POST['key']);

          if(!empty($message)) {
            $message = strtoupper($message); //to make all alphabet char to upper
            $choppedMessage = str_split($message); //split the message to array
            $key = $key % 25;

            echo '<p>Result: ';
            foreach($choppedMessage as $ltr) {
              //65 to 90 A-Z ASCII
              if(ord($ltr) > 64 && ord($ltr) < 91) {
                if((ord($ltr)+$key) > 90) {
                  $ltr = chr(((ord($ltr) + $key) - 90) + 64);
                } else {
                  $ltr = chr(ord($ltr) + $key);
                }
              }
              echo $ltr;
            }
            echo '</p>';
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
