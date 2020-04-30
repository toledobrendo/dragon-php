<?php
  /*
    Encrypt = (msg + key) modulo 26
    A = '65'
  */
  function encryptMessage($msg,$key){
    $msg = str_split(strtoupper($msg));
    for ($i=0; $i < count($msg); $i++) { 
      if(ctype_alnum($msg[$i])){
        $msg[$i] = chr((ord($msg[$i])+$key- 65) % 26 + 65);
      }
    }
    return $msg;
  }
  
  function decryptMessage($msg,$key){
    $msg = str_split(strtoupper($msg));
    for ($i=0; $i < count($msg); $i++) { 
      if(ctype_alnum($msg[$i])){
        $msg[$i] = chr((ord($msg[$i])-$key- 65) % 26 + 65);
      }
    }
    return $msg;
  }
?>
<!doctype html>
<html lang="en">

<head>
  <title>Homework 2</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- CSS -->
  <!-- <link rel="stylesheet" href="./htdocs/css/style.css"> -->
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="card">
      <div class="card-body">
        <!-- Add Content -->
        <h1 class="card-title text-left w-100">Caesar Shift</h1>
        <form method="POST" action="">
          <div class="form-group">
            <label for="msgEncrypt" class="w-100">Message</label>
            <textarea class="form-control d-inline-block w-100" rows="2" name="msgEncrypt" id="msgEncrypt" required></textarea>
            <label for="keyEncypt" class="w-100">Key</label>
            <input type="number" class="w-100 mb-3" name="keyEncrypt" id="keyEncrypt" required>
            <input type="submit" class="btn btn-primary mb-1">
            <?php
              @$keyEncrypt = $_POST['keyEncrypt'];
              @$msgEncrypt = $_POST['msgEncrypt'];
              $msgEncrypt = implode(encryptMessage($msgEncrypt,$keyEncrypt));
              echo '<br/>Output: ',$msgEncrypt;
            ?>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>