<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<title></title>
</head>
<body>
	<div class="container">
		<div class="card">
      <div class="card-body">
        <h1 class="card-title">Caesar Shift</h1>
        <form action="" method="post">
            <p>Message</p>
            <input type="text" name="message" value="<?php echo isset($_POST['message']) ? $_POST['message'] : '' ?>" class="form-control" required autofocus/>
            <p></br>Key</p>
            <input type="number" name="key" value="<?php echo isset($_POST['key']) ? $_POST['key'] : '' ?>" class="form-control" required /></br>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>

            <?php
              if(isset($_POST['submit'])){
                //Do action here when submitted
                $input = $_POST['message'];
                $key = $_POST['key'];

                echo "</br></br>Result: ";
                echo strtoupper(Encipher($input,$key));
              }

              function Encipher($input, $key)
              {
              	$output = ""; //instantiate variable

              	$inputArr = str_split($input); //aray of input
              	foreach ($inputArr as $ch)
              		$output .= Cipher($ch, $key); //Do Cipher function for each character

              	return $output;
              }

              function Cipher($ch, $key)
              {
              	if (!ctype_alpha($ch)) //return if it's not alphabet
              		return $ch;

              	$offset = ord(ctype_upper($ch) ? 'A' : 'a'); //Uppercase every character
              	return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset);
              }
            ?>

        </form>

      </div>
    </div>
	</div>
</body>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
