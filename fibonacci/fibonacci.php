	<html>
<head>
	<title>Fibonacci Sequence</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous">

</head>
<body>
	<div class="container">
      	<div class="card">
       		<div class="card-body">
          		<h3 class="card-title">Fibonacci Sequence Viewer</h3>
          		<hr>
          		<h5 class="card-title">Sequence Length: </h5>
          		<hr>
          		<form action="listSequence()" method="post">
	                <input  type="number" name="seqLength" min="0" class="form-control"/>
	                <br>
	                <button type="submit" class="btn btn-primary ">Submit</button>
          		</form>

          		<?php  
          			function listSequence(){
          				$seqLength = @($_POST['seqLength']);

	          			if(!empty($seqLength)){
	          				$prev = 0;
	          				$next = 1;
	          				$temp = 0;
	          				$sum = 0;

	          				echo $prev."<p>&#09; </p>";
	          				echo $prev."<p>&#09; </p>";
	          				// for($i = 0; $i <$seqLength; $i++){
	          				// 	$sum = $prev + $next;

	          				// }
	          			}
          			}
          			


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