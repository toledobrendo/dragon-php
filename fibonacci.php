<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous">
    <title>Fibonacci Sequence</title>
  </head>
  <body>
    <div class="container">
      <div class="card">
        <div class="card-body">
          <table>
            <form class="" action="" method="post">
              <thead><td class="col-12"><h1>Fibonacci Sequence</h1></td></tr></thead>
              <tr class="row">
                <td class="col-12"><label for="fib_input">Sequence Length</label></td>
              </tr>
              <tr class="row">
                <td class="col-11"><input type="number" class="form-control" name="input" min="1"></td>
                <td class="col-1"><button type="submit" name="submit" class="btn btn-primary">Submit</button></td>
              </tr>
              <tr class="row">
                <td class="col-12"><label for="series">
                  <?php
                  echo 'Series Length';
                  if(isset($_POST['input']))
                    echo ': '.$_POST['input'];
                  ?>
                </label></td>
              </tr>
              <tr class="row">
                <td class="col-12">
                  <?php
                  if(isset($_POST['input'])) {
                    $num1 = 1;
                    $num2 = 0;
                    for ($i=$_POST['input']; $i > 0; $i--) {
                      echo "$num2".'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                      $num2 += $num1;
                      $num1 = $num2 - $num1;
                    }
                  }
                  ?>
                </td>
              </tr>
            </form>
          </table>
          <?php

          ?>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"></script>
  </body>
</html>
