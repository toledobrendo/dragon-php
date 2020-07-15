<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Caesar Shift Encryptor</title>
  </head>

<body>
  <br><br>
  <div class="container">
    <div class="card">
      <div class="card-body">
          <h2 class="card-title"><center>Caesar Cipher</center></h2>

              <?php
                $msg = @($_POST['message']);
                $key = @($_POST['key']);
              ?>

              <form method="post">
                <h5 class="card-title">Message: </h5>
                  <input value= "<?php echo $msg ?>" type="text" name="message" class="form-control" placeholder="input message" required/><br>
                <h5 class="card-title">Key: </h5>
                  <input value= "<?php echo $key ?>" type="number" name="key" class="form-control" placeholder="0" required/><br>
                <button type="submit" class="btn btn-primary ">Submit</button>
              </form>

              <hr>

              <h6>OUTPUT:</h6>

          <?php
            function procedure($char, $key)
            {
              if (!ctype_alpha($char)){
                return $char;
              }else{
                if($key>0){
                  $temp = ord(ctype_upper($char) ? 'A' : 'a');
                  return strtoupper(chr(fmod(((ord($char) + $key) - $temp), 26) + $temp));
                }else{
                  $temp = ord(ctype_upper($char) ? 'Z' : 'z');
                  return strtoupper(chr(fmod(((ord($char) + $key) - $temp), 26) + $temp));
                }
              }
            }

            function caesarCipher($msg, $key)
            {
              $output = "";
              for($ite =0; $ite<strlen($msg); $ite++)
                $output .= procedure($msg[$ite], $key);

              return $output;
            }

            echo caesarCipher($msg,$key);
          ?>

      </div>
    </div>
  </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>
