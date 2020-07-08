<html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>

  <body>
    <div class="container">
      <div class="card">
        <div class="card-body">
          <h1 class="card-title"><b> Assignment 1: Fibbonacci Sequence</h1></b>
          <br>
          <form method="post">
            <div>
              <h4> Enter Sequence Length: </h4>
              <input type="number" name="sequence" min="0" maxlength="5" class="form-control">
              <br>
              <button type="submit" class="btn btn-success float-right">Submit</button>
            </div>
          </form>
            <div>
              <?php
                $sequence = @$_POST['sequence'];

                if ($sequence==0) {
                 echo 'You did not put anything. Pls enter your desired sequence length!';
                }

                else
                 echo '<h5> The sequence length is <b>'.$sequence.'</h5></b><br/>';

                 $counter = 0; 
                 $firstNumber = 0; 
                 $secondNumber = 1; 

                  while ($counter < $sequence){ 
                    
                     echo '<b>'.$firstNumber.'</b>      ';
                        
                        $thirdNumber = $secondNumber + $firstNumber; 
                        $firstNumber = $secondNumber; 
                        $secondNumber = $thirdNumber; 
                        $counter++;           
                  } 

              ?>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>

</html>