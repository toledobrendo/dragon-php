<?php
  define('TIRE_PRICE',10);
  define('OIL_PRICE',100);
  define('SPARK_PRICE',1000);
  require_once('view-bob/header.php');
 ?>

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
         <?php
         require_once('view-bob/footer.php');
          ?>
