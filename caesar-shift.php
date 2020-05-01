<html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </head>

  <body>
    <div class="container">
      <div class="card">
        <div class="card-body">
          <h1 class="card-title">Caesar Shift</h1>
          <div>
            <form method="post">
              <div>
                <label>Message</label>
                <input type="text" name="message" class="form-control" required>
              </div>
              <div>
                <label>Key</label>
                <input type="number" name="key" min="1" class="form-control" required>
              </div>
              <div>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
            <div>
              <?php
                echo "Result: ";

                $message = @$_POST['message'];
                $key = @$_POST['key'];

                $message = strtoupper($message);

                while ($key > 26) {
                  $key = $key - 26;
                }

                for ($index = 0; $index < strlen($message); $index++) {
                  $char = $message[$index];

                  if (ctype_alpha($char)) {
                    $char = chr(ord($char) + $key);

                    while (ord($char) > ord('Z')) {
                      $char = chr(ord($char) - 26);
                    }
                  }

                  echo "$char";
                }


              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

</html>
