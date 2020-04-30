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
				<h1>Caesar Cipher</h1>

				<table class="table">
					<tbody>
						<form name="form" action="" method="post">
							<tr class="row">
								<td class="col-5"><b>Message</b></td>
								<td class="col-5">
									<textarea name="msg-input" class="msg-input" rows="5" cols="60"></textarea>	
								</td>

								<td class="col-5"><b>Key</b></td>
								<td class=:"col-5">
									<input type="number" name="key" id="key" min="0" class="key"/>
								</td>


								<td class=:"col-5">
									<button type="submit" class="btn-primary float-right" name="show">Submit</button>
								</td>

								<?php
									$btnsubmit = @(($_POST['show']));

									if (isset($btnsubmit)) {
										$str = $_POST['msg-input'];
										$offset = $_POST['key'];

										function encrypt($str, $offset) {
											$encrypted_text = "";
											$offset = $offset % 26;
											
											if($offset < 0) {
		    									$offset += 26;
											}
											$i = 0;

											while($i < strlen($str)) {
		    									$c = strtoupper($str{$i});

		    									if(($c >= "A") && ($c <= 'Z')) {
		        									if((ord($c) + $offset) > ord("Z")) {
		           		 								$encrypted_text .= chr(ord($c) + $offset - 26);
		    										} else {
		        										$encrypted_text .= chr(ord($c) + $offset);
		    										}
		  										} else {
		     										$encrypted_text .= " ";
		  										}
		  										$i++;
											}
											return $encrypted_text;
										}

										function decrypt($str, $offset) {
	    									$decrypted_text = "";
	    									$offset = $offset % 26;

	    									if($offset < 0) {
	        									$offset += 26;
	    									}

	    									$i = 0;

	    									while($i < strlen($str)) {
	        									$c = strtoupper($str{$i}); 

	        									if(($c >= "A") && ($c <= 'Z')) {
	            									if((ord($c) - $offset) < ord("A")) {
	               										$decrypted_text .= chr(ord($c) - $offset + 26);
	        										} else {
	            										$decrypted_text .= chr(ord($c) - $offset);
	        										}
	     										} else {
	          										$decrypted_text .= " ";
	      										}
	      										$i++;
	    									}
	    									return $decrypted_text;
										}

										$encryptText = encrypt($str, $offset);

										echo '<td class=:"col-5">';
										echo '<b>RESULT: </b>' .$encryptText;
										echo '</td>';
									}
								?>
								
								
							</tr>
						</form>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>