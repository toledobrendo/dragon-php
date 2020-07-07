<?php
@$text = $_POST['Message'];
@$key = $_POST['Key'];
 ?>


 
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
    crossorigin="anonymous">

</head>
<body>
  <div class="container">
    <div class="card">
      <div class="card-body">
        <h1>Caesar cipher</h1>
        <p>A Caesar cipher also known as caesar shift, is one of the simplest and most well-known encryption techniques.</p>
        <form action="caesar-shift.php" method="POST">

        <!-- INPUT MESSAGE HERE -->
        <p>Message:</p>
        <input type="text" name="Message" class="form-control" value="<?php echo $text ?>">
        <br>

        <!-- INPUT KEY HERE-->
        <p>Key:</p>
        <input type="number" name="Key" class="form-control" value=<?php echo $key ?>>
        <br>


        <input type="submit" class="btn btn-info float-right"></button>
        </form>



        <!-- PHP STARTS HERE =================================================================-->
        <!-- source -->
         <!--  1.) https://code.sololearn.com/wOl61a2F297E/#php
               2.) https://www.youtube.com/watch?v=Z3hA3ABbST0
          -->

        <?php

            @$text = $_POST['Message'];
            @$key = $_POST['Key'];



          function encrypt($text, $key)
          {

              $result = "";
              for ($i = 0; $i < strlen($text); $i++)
              {
                  ;
                  if (ctype_upper($text[$i])){ // It encrypt uppercase letters
                    $result = chr((ord($text[$i]) + $key - 65) % 26 + 65);
                    echo $result;
                  }
                  else if(ctype_lower($text[$i])){ // It encrypt lowercase letters
                    $result = chr((ord($text[$i]) + $key - 97) % 26 + 97);
                    echo strtoupper($result);
                  }
                  else //When there is a none alphabet character on the text
                    echo $text[$i];
              }

              return $result;
          }

          echo "Result: ";
          encrypt($text, $key);



          ?>
          <!-- PHP ENDS HERE ===============================================================-->




      </div>

      <!-- fun facts can be deleted ,serves really no purpose -->
      <p>Fun fact: Named after Julius Caesar, it is one of the oldest types of ciphers and is based on the simplest monoalphabetic cipher.</p>

    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>