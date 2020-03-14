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
        <h1 class="card-title">Bob's Auto Parts</h1>
        <h3 class="card-title">Order Result</h3>
        <?php
        echo "<p>Order process at ";
        echo date('H:i, jS F Y');
        echo '</p>';

        $tireQty = $_POST['tireQty'];
        $oilQty = $_POST['oilQty'];
        $spQty = $_POST['spQty'];

        echo "<p>Your order is as follows</p>";
        echo "$tireQty tires<br/>";
        echo "$oilQty Oils<br/>";
        echo "$spQty Sparkplug<br/>";
         ?>
         <button type="submit" class="btn btn-primary" onclick="window.location.href = 'OrderForm.php';"><i class="fas fa-arrow-left"></i> Go Back</button>
      </div>
    </div>
  </div>

  <script src="https://kit.fontawesome.com/e4cf9541ab.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>
