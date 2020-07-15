<html>

<head>
  <!-- required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- css bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <title> Fibonacci Sequence </title>
</head>


<body>
  <br><br>
	<div class="container">
      <div class="card">
       		<div class="card-body">
          		<h2 class="card-title"><center>Fibonacci Sequence</center></h2>
          		<hr>
          		<h5 class="card-title">Sequence Length: </h5>
          		<form method="post">
	                <input  type="number" name="sLength" min="0" class="form-control" placeholder="input length" require/d >
	                <br>
	                <button type="submit" class="btn btn-primary ">Submit</button>
          		</form>
              <hr>

          		<?php
	          		$sLength = @($_POST['sLength']);
	          		function sequenceList($n){
					        if ($n == 0)
					          return 0;
					        else if ($n == 1)
					          return 1;
					        else
					          return (sequenceList($n-1) + sequenceList($n-2));
					      }

					      echo "<h7> Series Length: </h7>".$sLength."<br><br>";
					      echo "<table width=80%>";
            		echo "<tr>";
				        for($i = 0 ; $i < $sLength ; $i++){
				    	     echo "<td>".sequenceList($i)."<td>";
				        }
				        echo "</tr></table>";
          		?>

        	</div>
      </div>
  </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>
