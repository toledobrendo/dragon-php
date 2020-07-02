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

          <h1>Fibonacci sequence</h1>
           <p>The Fibonacci sequence is a set of numbers that starts with a one or a zero, followed by a one, and proceeds based on the rule that each number (called a Fibonacci number) is equal to the sum of the preceding two numbers</p>

          <br>

          <p>Enter a sequence length</p>

         

          <form action="fibonacci-seq.php" method="POST">
            <input type="number" name="sequence" class="form-control">
            <br>
            <input type="submit" class="btn btn-info float-right"></button>
          </form>


         <!-- source -->
         <!--  1.) https://www.geeksforgeeks.org/php-fibonacci-series/
          	   2.) https://www.javatpoint.com/php-fibonacci-series
          	   3.) https://stackoverflow.com/questions/47114600/fibonacci-sequence-program-in-php-trouble-getting-input-from-user-and-declarin 
          	   4.) https://www.youtube.com/watch?v=2WOJWN695wU 
          -->



         <!--  PHP AREA HERE Rev Eng fibonacci sources START BORDER AREA ================================================ -->
          <?php

	          if(isset($_POST['sequence']))
	          {

		            $num = $_POST['sequence'];
		            $n1 = 0;
		            $n2 = 1;
		            //$n3 = 1;

		            echo 'Sequence Length: '.$num.'<br/>';

		            for($index=0;$index<$num;$index++){
		                if($index<=1) {

		                    $next=$index;

		                } else{

		                    $next = $n1+$n2;
		                    $n1 = $n2;
		                    $n2 = $next;
		                }

		                echo  $next." ";
		            }
	          }

          ?>
          <!--  PHP AREA HERE RE fibonacci sources END BORDER AREA ================================================ -->







        </div>

      <!-- fun facts can be deleted ,serves really no purpose -->
     <p>Fun fact #1:Fibonnacci sequence was the solution of a rabbit population puzzle in Liber Abaci</p>
     <p>Fun fact #2:Liber Abaci is a historic 1202 Latin manuscript on arithmetic by Leonardo of Pisa, posthumously known as Fibonacci.</p>

      </div>
    </div>