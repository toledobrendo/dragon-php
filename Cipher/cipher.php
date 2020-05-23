<?php 
	$message = @($_POST['message']);
	$key = @($_POST['key']);
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous">
  </head>
  <body>
    <!-- hello-world.php or hello_world.php -->
    <!-- Note: Observe proper indention -->
    <div class="container">
      <div class="card">
        <div class="card-body">
        	<h3 class="card-title">Caesar Cipher</h3>
          		<hr>
          		<form method="post">
          			<h6 class="card-title">Message: </h65>
	                <input  value= "<?php echo $message ?>" placeholder="MESSAGE" type="text" name="message" class="form-control" required />
	                <br>
	                <h6 class="card-title">Key: </h6>
	                <input  value= "<?php echo $key ?>" placeholder="0" type="number" name="key" class="form-control" required />
	                <br>
	                <button type="submit" class="btn btn-primary ">Submit</button>
          		</form>
          		<hr>
          		<h6>OUTPUT:</h6>
          		<br>
          <?php
            function formula($char, $key)
			{
				if (!ctype_alpha($char)){
					return $char;
				}else{
					if($key>0){
						$temp = ord(ctype_upper($char) ? 'A' : 'a');
						return strtoupper(chr(fmod(((ord($char) + $key) - $temp), 26) + $temp));
					}else{
						$temp = ord(ctype_upper($char) ? 'Z' : 'z');
						return strtoupper(chr(fmod(((ord($char) + $key) - $temp), 26) + $temp));
					}
				}
			}

			function caesarCipher($message, $key)
			{
				$output = "";

				for($ite =0; $ite<strlen($message); $ite++)
					$output .= formula($message[$ite], $key);

				return $output;
			}

			echo caesarCipher($message,$key);
          ?>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"></script>
  </body>
</html>