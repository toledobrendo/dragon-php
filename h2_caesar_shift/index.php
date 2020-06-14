<!DOCTYPE html>
<html>
<head>
  <title>Caesar Shift</title>
</head>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<body>
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h1> Caesar Shift </h1>
      </div>

      <div class="card-body">
        <div>
          <p> Message </p>
          <!--Note: h2_caesar_shift/caesar-shift.php is missing-->
          <!--Changed the missing action to the index itself instead-->
          <form action="index.php" method="post">
            <input type="text" name="message" class="form-control"/>
          </div>

          <div>
            <p> Key </p>
            <input type="number" name="key" class="form-control"/>
          </div>

          <div>
          </br>
          <button type="submit" class="btn btn-primary float-right">Submit</button>
        </div>

        <div>
          <?php
          //Inputed values from the user
            $messageUser = @$_POST['message'];
            $keyUser = @$_POST['key'];
          //Computed Value
            $encryptedMessage = "";

            for($iteration = 0; $iteration < strlen($messageUser); $iteration++)
            {
              // Encrypt Uppercasee
              if (ctype_upper($messageUser[$iteration]))
              $encryptedMessage = $encryptedMessage.chr((ord($messageUser[$iteration]) + $keyUser - 65) % 26 + 65);

              // Encrypt Lowercase letters
              else
              $encryptedMessage = $encryptedMessage.chr((ord($messageUser[$iteration]) + $keyUser - 97) % 26 + 97);
            }

            echo $encryptedMessage;

          ?>

        </div>

      </div>
    </div>
    <!--Changed the go back button to RESET instead-->
    <div class="card-footer">
      <a class="btn btn-info" href="index.php">RESET</a>
    </div>
  </div>

</body>

</html>
