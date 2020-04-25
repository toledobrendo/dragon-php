<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Caesar Shift</title>
  </head>
  <body>

  	<div class="container">
  		<div class="card">
  			<div class="card-body">
         <form action="caesar-shift.php" method="post">
              <h1>Caesar Shift</h1>
              <br>
              <h5>Message</h5>
              <br>  

                <input type="text" name="message" min="0" class="form-control"/>
                <br>
                <h5>Key:</h5>
                <input type="number" name="key" maxlength="2" min="0" class="form-control"/>
                <br>
                <div class="input-group-append">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>

              <br>
              <?php
                echo '<p>Processed at ';
                echo date ('H:i,jS F Y');
                echo '</p>';

                @($message= $_POST['message']);
                @($key= $_POST['key']? $_POST['key'] : 0);

                  $arrayMsg = str_split($message);
                  $countMsg = count($arrayMsg);

                for ($i=0; $i < $countMsg ; $i++) { 

                    for ($shiftKey=0; $shiftKey < $key ; $shiftKey++) { 
                      if ($arrayMsg[$i] == "Z") {                     
                         $arrayMsg[$i] == "A";
                       }
                      else{
                        $arrayMsg[$i]++;
                      } 
                    }
                }
                echo 'Word: ' .$message. '<br/>';
                echo 'Key: ' .$key. '<br/>';
                echo 'Result: ';
                foreach ($arrayMsg as $result) {
                       $upper = strtoupper($result);                 
                       echo $upper;
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