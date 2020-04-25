<?php
  define('TIRE_PRICE',10);
  define('OIL_PRICE',100);
  define('SPARK_PRICE',1000);
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
        <h1 class="card-title">Bob's Auto Parts</h1>
        <h3 class="card-title">Order Result</h3>
        <?php
        echo "<p>Order process at ";
        echo date('H:i, jS F Y');
        echo '</p>';

        $tireQty = $_POST['tireQty'] ? $_POST['tireQty'] : 0;
        $oilQty = $_POST['oilQty'] ? $_POST['oilQty'] : 0;
        $spQty = $_POST['spQty'] ? $_POST['spQty'] : 0;
        $find = $_POST['find'];
        $totalQty = @($tireQty +$oilQty + $spQty);

        switch($find) {
             case 'regular':
               echo 'Regular Customer <br/>';
               break;
             case 'tv':
               echo 'From TV Advertising <br/>';
               break;
             case 'phone':
               echo 'From Phone Directory <br/>';
               break;
             case 'mouth':
               echo 'From Word of Mouth <br/>';
               break;
             default:
               echo 'Unknown Customer <br/>';
               break;
           }
           if($totalQty == 0){
             echo 'You Did not order anything<br/><br/>';
           }else{
             echo "<p>Your order is as follows</p><br/>";
             if($tireQty > 0){
               echo $tireQty. ' tires<br/>';
             }
             if($oilQty > 0){
               echo "$oilQty Oils<br/>";
             }
             if($spQty > 0){
               echo "$spQty Spark plugs<br/><br/>";
             }

           }




        // echo '<p>Prices<br/>';
        // echo 'Tires: '.TIRE_PRICE.'<br/>';
        // echo 'Oil: '.OIL_PRICE.'<br/>';
        // echo "Spark Plugs: ".SPARK_PRICE.'<br/><br/>';


        echo 'Total Quantity: '.$totalQty.'<br/><br/>';

        $tireAmount = @($tireQty * TIRE_PRICE);
        $oilAmount = @($oilQty * OIL_PRICE);
        $sparkAmount= @( $spQty * SPARK_PRICE);

        $totalAmount = $tireAmount + $oilAmount + $sparkAmount;

        // $otherTotalAmount = &$totalAmount;
        // $otherTotalAmount += $oilAmount;
        // $totalAmount += $sparkAmount;

        $VATableAmount = $totalAmount / 1.12;
        $VatAmount = .12 * $VATableAmount;
        // echo 'Other Total Amount: '.$otherTotalAmount.'<br/>';
        $TotalAmount = $VatAmount + $VATableAmount;

        echo 'VaTable Amount: '.$VATableAmount.'<br/>';
        echo 'VAT Amount(12%): '.$VatAmount.'<br/>';
         echo 'Total Amount: '.$TotalAmount.'<br/>';

         echo 'Amount exceeded 500? '.($TotalAmount > 500 ? 'Yes' : 'No').'<br/><br/>';
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
