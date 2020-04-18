<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Fibonacci Sequence</title>
  </head>
  <body>

  	<div class="container">
  		<div class="card">
  			<div class="card-body">
         <form action="fibonaccisequence.php" method="post">
              <h1>Fibonacci Sequence</h1>
              <br>
              <h5>Sequence Length</h5>
              <br>  

              <div class="input-group mb-3">
                <input type="number" name="sLength" maxlength="2" min="0" class="form-control"/>
                <div class="input-group-append">
                  <button type="submit" class="btn btn-primary float-right">Submit</button>
                </div>
              </div>

              <br>
              <?php
                echo '<p>Processed at ';
                echo date ('H:i,jS F Y');
                echo '</p>';

                @($sLength= $_POST['sLength']? $_POST['sLength'] : 0);
                echo 'Series Length: ' .$sLength. '<br/>';

                  $counter = 0;
                  $num1 = 0;
                  $num2 = 1;

                  while ($counter !=$sLength){
                  echo 
                  '<tr class="row">
                      <td class="col-3">'.$num1.'   </td> <!-- prints the current number -->
                  </tr>';
                  $prev  = $num1 + $num2; 
                  $num1 = $num2;  
                  $num2 = $prev;  
                  $counter ++;
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