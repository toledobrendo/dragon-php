<?php
  define('TIRE_PRICE', 100);
  define('OIL_PRICE', 100);
  define('SPARK_PRICE', 100);
  define('VAT_RATE', .12);
  define('VATABLE_RATE', 1.12);
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Resulta ni Bob</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2>Bob's Auto Parts</h2>
                <h3 class="card-title">Order Result</h3>
                <?php
                    /* Get Data */
                    $tireQty = $_POST['tireQty'];
                    $oilQty = $_POST['oilQty'];
                    $sparkQty = $_POST['sparkQty'];
                    /* Process Data */
                    $totalPrice = (float)($tireQty*TIRE_PRICE)+($oilQty*OIL_PRICE)+($sparkQty*SPARK_PRICE);
                    $vatAble = (float)$totalPrice / VATABLE_RATE;
                    $vatAmnt = (float)VAT_RATE*($totalPrice/VATABLE_RATE);
                    /* Print */
                    echo "<p>Order Processed at ";
                    echo date("H:i, jS F Y");
                    echo "</p>";
                    echo "Your order is as follows<br><br>";
                    echo "$tireQty tires.<br>";
                    echo "$oilQty bottles of oil.<br>";
                    echo "$sparkQty spark plugs.<br><br>";
                    echo "Vatable Amount: $vatAble<br>";
                    echo "VAT Amount (12%): $vatAmnt<br>";
                    echo 'Total Amount: ' .$totalPrice.'<br/><br/>';
                    echo 'Total Price exceeded 500 but less than 1000? '.($totalPrice > 500 && $totalPrice < 1000? 'Yes' : 'No').'<br/>';
                ?>
            </div>
            <div class="card-footer">
              <a class="btn btn-info" href="order-form.php">Back to home</a>
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