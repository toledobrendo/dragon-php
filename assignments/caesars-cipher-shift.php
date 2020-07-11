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
          <h1 class="card-title"><b> Assignment 2: Caesar's Cipher Shift</h1></b>
          <br>
          <form method="GET">
            <div>
              <h4> Enter Message: </h4>
              <input type="text" name="message" id="message" placeholder="Input Message" class="form-control">
              <br>
              <h4> Enter Key: </h4>
              <input type="number" name="key" id="key" placeholder="Input key" class="form-control">
            </div>
            <br>
            <button class="btn btn-primary">Submit</button>
          </form>
            <div>

             <?php
                // Note: Spaces were not handled. "hello world", 1 key yields "IFMMQXQSME"
                @$message = $_GET['message'];
                $message = @$_GET['message'];
                $key = @$_GET['key'];

                $encryptedText;

                $first=array(
                 "A","B","C","D","E","F","G","H","I","J","K","L",
                 "M","N","O","Q","R","S","T","U","V","W","X","Y","Z"
                );
              
               $index;
               $allCaps=strtoupper($message);
               $encryptedText=str_split($allCaps);
               $counter=0;

               echo '<b>You entered: '.$message.'</b>  ';
               echo '<br>';
               echo '<b>The key is: ';
              
               for($x= 0; $x< count($encryptedText); $x++){
                  
                for ($y=0; $y < count($first); $y++){
                    
                  if ($encryptedText[$x] == $first[$y]) {
                    $index[$counter] = $y;
                    $counter++;
                  }
                
                }
               
               }

               for ($counter2=0; $counter2 < @count(@$index) ; $counter2++) {
                
                echo $first[(($index[$counter2]+$key)%26)];
                
                }
          ?>

        </div>

      </div>

     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>