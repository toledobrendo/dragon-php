<!doctype html>
<html lang="en">

<head>
  <title>Fibonacci</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <div class="container h-100">
    <div class="card">
      <div class="card-body">
        <h1 class="card-title text-left w-100">Fibonacci Sequence</h1>
        <form method="POST" action="">
          <div class="form-group">
            <label for="seqLength" class="w-100">Sequence Length</label>
            <input type="number" class="form-control d-inline-block w-75" name="seqLength" id="seqLength">
            <button class="btn btn-info d-inline-block">Submit</button>
            <!-- Get Length of the sequence -->
            <p class="card-text">Series Length:
              <?php
              @$seqLength = (int) $_POST['seqLength']; //Surpress warnings becasue why not. Note: Good choice on this.
              ?></p>
            <!-- Compute for the sequence -->
            <div class="d-flex align-content-between flex-wrap">
              <?php
              //Variables
              $x = 0;
              $y = 1;
              //Compute and print results
              for ($i = 0; $i < $seqLength; $i++) {
                echo '<div class="p-3">'.$x.'</div>';
                $sum = $x + $y;
                $x = $y;
                $y = $sum;
              }
              ?>
            </div>
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