<?php 
    // constant variables
    define('TIRE_PRICE', 100);
    define('OIL_PRICE', 50);
    define('SPARK_PRICE', 30);
?>

<?php
  require_once('defaults/header.php');
?>

          <h3 class="card-title">Order Result</h3>
          <?php
            echo '<p>Order Processed at ';
            echo date ('H:i,jS F Y');
            echo '</p>';

            $tireQty= $_POST['tireQty']? $_POST['tireQty'] : 0;
            $oilQty= $_POST['oilQty']? $_POST['oilQty'] : 0;
            $sparkQty= $_POST['sparkQty']? $_POST['sparkQty'] : 0;
            $find= $_POST['find'];

            switch($find){
              case 'regular':
                echo 'Regular Customer';
                break;
              case 'tv':
                echo 'From TV Advertising';
                break;
              case 'phone':
                echo 'From Phone Directory';
                break;
              case 'mouth':
                echo ' From Word of Mouth';
                break;
              default:
                echo 'Unknown Customer';
                break;
            }

            echo '<p>Prices<br/>';
            echo 'Tires:'.TIRE_PRICE.'<br/>';
            echo 'Oil:'.OIL_PRICE.'<br/>';
            echo 'Spark Plugs: '.SPARK_PRICE.'<br/><br/>';

            $totalQty=@($tireQty+$oilQty+$sparkQty);

            if($totalQty == 0){
              echo 'You didnt order anything. <br/> <br/>';
            }
            else{
              echo '<p> Your order is as follows:</p>';
              echo $tireQty.'tires<br/>';
              echo $oilQty.'bottles of oil<br/>';
              echo $sparkQty.'Spark Plugs<br/><br/>';

              if($tireQty>0)
                echo"$tireQty tires <br/>";
              if($tireQty>0)
                echo"$oilQty oil <br/>";
              if($tireQty>0)
                echo"$sparkQty spark plugs <br/>";

            }
            echo 'Total Quantity: '.$totalQty.'<br/>';

            $tireAmount = @($tireQty * TIRE_PRICE);
            $oilAmount = @($oilQty * OIL_PRICE);
            $sparkAmount = @($sparkQty * SPARK_PRICE);
            
            $totalAmount=(float) $tireAmount;

            $otherTotalAmount = &$totalAmount;
            $otherTotalAmount += $oilAmount;
            $totalAmount += $sparkAmount;

            $VAT = $totalAmount * 0.12;
            $VATable = $totalAmount - $VAT;
            $VATAmount = 0.12 * $VATable;
            $Total = $VATAmount + $VATable;

            echo 'Other Total Amount: '.$otherTotalAmount.'<br/>';
            echo 'Total Amount:'.$totalAmount.'<br/>';
            echo 'Amount exceeded 500?  '.($totalAmount > 500 ? 'Yes' :'No').'<br/>';
            echo 'VATable Amount: '.($Total).'<br/>';
            echo 'VAT Amount: '.($VATAmount).'<br/>';


            echo 'is $totalAmount string? ' .(is_string($totalAmount) ? 'Yes' : 'No').'<br/>';
            unset($totalAmount);
            echo 'is $totalAmount set?' .(isset($totalAmount)? 'Yes' : 'No').'<br/>';
            
            $totalAmountTwo = 0;
            echo 'IS $totalAmountTwo set? '.(isset($totalAmountTwo) ? 'Yes' :  'No' ).'<br/>';
            echo 'IS $totalAmountTwo empty? '.(empty($totalAmountTwo) ? 'Yes' :  'No' ).'<br/>';

          ?>
  			</div>
        <div class="card-footer">
          <a class="btn btn-info" href="order-form.php">Go Back</a>
        </div>
  		</div>
  	</div>
 
  <?php
    require_once('defaults/footer.php');
  ?>