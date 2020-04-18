<!doctype html>
<?php 
    // constant variables
    define('TIRE_PRICE', 100);
    define('OIL_PRICE', 50);
    define('SPARK_PRICE', 30);
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

  	<div class="container">
  		<div class="card">
  			<div class="card-body">
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
 
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>