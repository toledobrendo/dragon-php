<?php
  require_once('defaults/header.php');
  require_once('Scripts/scripts.php');
  require_once('service/order-service.php');
  require_once('exception/file-not-found-exception.php');
?>

<?php 
    // constant variables
    define('TIRE_PRICE', 100);
    define('OIL_PRICE', 50);
    define('SPARK_PRICE', 30);
?>
          

        
          <h3 class="card-title">Order Result</h3>
          <?php

            echo '<p>Order Processed at ';
            echo date ('H:i,jS F Y');
            echo '</p>';

            $_POST['TiresQty']? $items[0]->__set('Qty',$_POST['TiresQty']) : $items[1]->__set('Qty',0);
            $_POST['OilQty']? $items[1]->__set('Qty',$_POST['OilQty']) : $items[1]->__set('Qty',0);
            $_POST['SparkPlugsQty']? $items[2]->__set('Qty',$_POST['SparkPlugsQty']) : $items[1]->__set('Qty',0);

            $_POST['TiresQty']? $items[0]->__set('Qty',$_POST['TiresQty']) : $items[1]->__set('Qty',0);

            $tireQty= $items[0]->__get('Qty');
            $oilQty= $items[1]->__get('Qty');
            $sparkQty= $items[2]->__get('Qty');

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
            echo 'Tires:'.$items[0]->__get('price').'<br/>';
            echo 'Oil:'.$items[1]->__get('price').'<br/>';
            echo 'Spark Plugs: '.$items[2]->__get('price').'<br/><br/>';



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
              if($oilQty>0)
                echo"$oilQty oil <br/>";
              if($sparkQty>0)
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

            $VAT_PERCENT = (float) getPercent();
            function getPercent(){

                    try{
                      $file = @fopen(DOCUMENT_ROOT.'/dragon-php/bob-auto-parts/resource/properties.txt', 'rb');

                       if(!$file){
                        throw new FileNotFoundException ('No orders pending. Please try again later.',1);
                       }else{

                        while (!feof($file)) {
                          $text = fgets($file,999);
                          $text_part = explode('=', $text, 2);
                          return $text_part[1]; 
                        }

                        fclose($file);
                       }

                    }catch(FileNotFoundException $fnfe){
                      echo $fnfe->getMessage();
                      echo $fnfe;
                    }
            }

              $VAT = $totalAmount * $VAT_PERCENT;
              $VATable = $totalAmount - $VAT;
              $VATAmount = $VAT_PERCENT * $VATable;
              $Total = $VATAmount + $VATable;
              echo 'Vat%: '.$VAT_PERCENT.'<br/>';
              echo 'Other Total Amount: '.$otherTotalAmount.'<br/>';
              echo 'Total Amount:'.$totalAmount.'<br/>';
              echo 'Amount exceeded 500?  '.($totalAmount > 500 ? 'Yes' :'No').'<br/>';
              echo 'VATable Amount: '.($Total).'<br/>';
              echo 'VAT Amount: '.($VATAmount).'<br/>';


              echo 'is $totalAmount string? ' .(is_string($totalAmount) ? 'Yes' : 'No').'<br/>';
              // unset($totalAmount);
              echo 'is $totalAmount set?' .(isset($totalAmount)? 'Yes' : 'No').'<br/>';
              
              $totalAmountTwo = 0;
              echo 'IS $totalAmountTwo set? '.(isset($totalAmountTwo) ? 'Yes' :  'No' ).'<br/>';
              echo 'IS $totalAmountTwo empty? '.(empty($totalAmountTwo) ? 'Yes' :  'No' ).'<br/>';

              saveOrder($tireQty,$oilQty,$sparkQty,$totalAmount);


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