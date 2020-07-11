<?php
  require_once('view/header.php');
  require_once('model/content.php');
  require_once('model/item-inv.php');
  require_once('service/order-service.php');
  require_once('exception/file-not-found-exception.php');

  // define('TIRE_PRICE', 100);
  // define('OIL_PRICE',50);
  // define('SPARK_PRICE',30);

?>

          <h3 class="card-title">Order Result</h3>
          <?php

            echo '<p>Order Processed at ';
            echo date('H:i, jS F Y');
            echo '</p>';
           

           //php comments
           /**We play hard, we study harder**/


           $tireQty = $_POST['tireQty'] ? $_POST['tireQty'] :0 ;

           $oilQty = $_POST['oilQty'] ? $_POST['oilQty'] :0;

           $sparkQty= $_POST['sparkQty'] ? $_POST['sparkQty'] :0;
           $find = $_POST ['find'];

           switch($find){
            case 'regular':
              echo 'Regular Customer';
              break;
            case 'tv':
              echo 'from TV advert';
              break;
            case 'phone':
              echo 'from phone directory';
              break;
            case 'mouth':
              echo 'from word of mouth';
              break;
            default;
              echo 'from Anon Customer';
              break;
          }




                 //code 38-46 transferred to if else statement=====
                // echo '<p>Your order is as follows</p>';

                //code 41-43 is original and thus commented========
                //echo $tireQty.' tires <br/>';
                //echo $oilQty.' oils <br/>';
                //echo $sparkeQty.' sparks <br/><br/>';
                //=================================================

                //echo "$tireQty tires<br/>";
                //echo $oilQty.' oils <br/>';
                //echo $sparkeQty.' sparks <br/><br/>';




          echo '<br/>';
           //NEW LINES OF CODE========================================
           echo '<p>Prices<br/>';
           echo 'Tires: '.TIRE_PRICE.'<br/>';
           echo 'Oil: '.OIL_PRICE.'<br/>';
           echo 'Spark Plugs: '.SPARK_PRICE.'<br/><br/>';




           $totalQty = @($tireQty + $oilQty + $sparkQty);

           if ($totalQty == 0){
            echo 'You didnt order anything. <br/><br/>';
          } else {
            echo '<p>Your order is as follows</p>';
           
            if($tireQty > 0)
             echo "$tireQty tires<br/>";

            if($oilQty > 0)
             echo $oilQty.' oils <br/>';

            if($sparkQty > 0)
             echo $sparkQty.' sparks <br/><br/>';

            echo '<br/>';
           }

           echo 'Total Quantity: '.$totalQty.'<br/><br/>';

           // Note 1: @(something here) is a code where we hide errors from the user

           $tireAmount = @($tireQty * TIRE_PRICE);
           $oilAmount = @($oilQty * OIL_PRICE);
           $sparkAmount = @($sparkQty * SPARK_PRICE);

           $totalAmount = (float) $tireAmount;

           $otherTotalAmount = &$totalAmount;
           $otherTotalAmount += $oilAmount;
           $totalAmount += $sparkAmount;

           echo 'Other Total AMount: '.$otherTotalAmount.'<br/>';
           echo 'Total Amount: ' .$totalAmount.'<br/><br/>';


           //VAT AREA PART 1
           /**$totalAmount = (float) ($tireAmount + $oilAmount + $sparkAmount);
           echo 'Total Amount: ' .$totalAmount. '<br/><br/>';**/

           /**$vat = (float) (0.12 * $totalAmount);
           echo "VAT Amount: " .$vat . '<br/>';**/


           // Note: External VAT value missing
           //VAT AREA PART 2-CHOSEN
           $vatableAmount = $totalAmount / 1.12;
           $vat = $totalAmount - $vatableAmount;

           echo "VATable amount: " .$vatableAmount. '<br/>';
           echo "Vat: " .$vat. '<br/><br/>';



          
           echo 'Amount exceeded 500? ' .($totalAmount > 500? 'Yes' : 'No').'<br/><br/>';


           echo 'is $totalAmount string? ' .(is_string($totalAmount) ? 'Yes' : 'No').'<br/>';


           unset($totalAmount);


           unset($totalAmount); //deletes variable/s

           echo 'is $totalAmount set? ' .(isset($totalAmount)? 'Yes' : 'No').'<br/>';

           $totalAmountTwo = 0;

           echo 'is $totalAmountTwo set? ' .(isset($totalAmountTwo)? 'Yes' : 'No').'<br/>';
           echo 'is $totalAmountTwo empty? ' .(empty($totalAmountTwo)?'Yes' : 'No').'<br/>';


           saveOrder($tireQty, $oilQty, $sparkQty, $totalAmount);


           ?>
       </div>

        <div class="card-footer">
            <a class="btn btn-info" href="order-form.php">Go Back</a>

        </div>


<?php require_once('view/footer.php') ?>