<html>

<head>
	<title> Fibonacci </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

	<div class="container">
		<div class ="card">
			<div class="card-body">
        <h1 class="card-title"> Fibonacci Sequence </h1>
				<br>
				<h3 class="card-title"> Sequence Length </h3>
        <form action="fibonacci.php" method="POST">
          <input type="number" name="length" min="0" maxLength="3" class="form-control">
          <button type="submit" class="btn btn-primary float-right" > Submit </button>
        </form>
            <!--Note: Observe proper indention-->
				<?php
          $length = @($_POST['length']);

          if(!empty($length)) {
            echo '<p> Series length: '.$length;
            $fibo1 = 0;
            $fibo2 = 1;
            echo "<table width=1000px>";
            echo "<tr>";
            for($ite = 1; $ite <= $length; $ite+=1)
            {
              if($ite == 1) {
                echo "<td>".$fibo1."</td>";
              } else if ($ite == 2) {
                echo "<td>".$fibo2."</td>";
              } else {
                $fibo3 = $fibo1 + $fibo2;
                echo "<td>".$fibo3."</td>";
                $fibo1 = $fibo2;
                $fibo2 = $fibo3;
              }
              if(($ite%10) == 0) {
                echo '</tr>';
                echo "<tr >";
              }
            }
            echo '</tr>';
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
