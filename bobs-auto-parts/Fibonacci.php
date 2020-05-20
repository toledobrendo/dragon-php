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
    <div class="container">
      <div class="card">
        <div class="card-body">
          <h1>Fibonacci</h1>
          <p>Sequence Length</p>
          <form action="Fibonacci.php" method="POST">
            <input type="number" name="sequence" class="form-control">
            <input type="submit" class="btn btn-info float-right"></button>
          </form>

          <?php
//        Note: This file is not placed correctly. This must be outside bobs-auto-shop
          $num = $_POST['sequence']; // Note: Insert a suppress warning operator in this line
          $num1 = 0;
          $num2 = 1;
          echo 'Sequence Length: '.$num.'<br/>';

          for($i=0;$i<$num;$i++){
              if($i<=1){
                  $next=$i;
              } else{
                  $next=$num1+$num2;
                  $num1=$num2;
                  $num2=$next;
              }
              echo  $next." ";
          }

           ?>
        </div>
      </div>
    </div>
