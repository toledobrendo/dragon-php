<?php
  require_once('view-bob/header.php');
  require_once('controller/productObjects.php');
  require_once('service/vat.php');

  // Note: Constants should be in THIS_FORMAT
  define('VatAmount' ,getVat());
 ?>

        <h1 class="card-title">Bob's Auto Parts</h1>
        <h3 class="card-title">Order Result</h3>
        <?php
        echo "<p>Order process at ";
        echo date('H:i, jS F Y');
        echo '</p>';


        $_POST['Tireqty'] ? $items[0]->__set('quantity', $_POST['Tireqty']) : $items[0]->__set('quantity', 0);
		    $_POST['Oilqty'] ? $items[1]->__set('quantity', $_POST['Oilqty']) : $items[1]->__set('quantity', 0);
		    $_POST['Sparkplugqty'] ? $items[2]->__set('quantity', $_POST['Sparkplugqty']) : $items[2]->__set('quantity', 0);
		    $totalQty = $items[0]->__get('quantity') + $items[1]->__get('quantity') + $items[2]->__get('quantity');


        switch($_POST['find']) {
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
             if ($items[1]->__get('quantity') > 0) {
          			echo $items[1]->__get('quantity'). ' <i>'.$items[1]->__get('description').'</i><br/>';}
          	if ($items[0]->__get('quantity') > 0) {
          			echo$items[0]->__get('quantity'). ' <i>'.$items[0]->__get('description').'</i><br/>';}
            if ($items[2]->__get('quantity') > 0) {
          			echo$items[2]->__get('quantity'). ' <i>'.$items[2]->__get('description').'</i><br/>';}
          		}






        // echo '<p>Prices<br/>';
        // echo 'Tires: '.TIRE_PRICE.'<br/>';
        // echo 'Oil: '.OIL_PRICE.'<br/>';
        // echo "Spark Plugs: ".SPARK_PRICE.'<br/><br/>';


        echo 'Total Quantity: '.$totalQty.'<br/><br/>';

        $items[0]->totalCost();
        $items[1]->totalCost();
        $items[2]->totalCost();



        $totalAmount = $tires->__get('cost') + $oil->__get('cost') + $sparkplugs->__get('cost');

        // $otherTotalAmount = &$totalAmount;
        // $otherTotalAmount += $oilAmount;
        // $totalAmount += $sparkAmount;

        $VATableAmount = $totalAmount / (1 + VatAmount);
        $VatAmount = VatAmount * $VATableAmount;
        // echo 'Other Total Amount: '.$otherTotalAmount.'<br/>';
        $TotalAmount = $VatAmount + $VATableAmount;

        echo 'VaTable Amount: '.$VATableAmount.'<br/>';
        echo 'VAT Amount('.VatAmount.'%): '.$VatAmount.'<br/>';
         echo 'Total Amount: '.$TotalAmount.'<br/>';

         echo 'Amount exceeded 500? '.($TotalAmount > 500 ? 'Yes' : 'No').'<br/><br/>';
         saveOrder($tires->__get('quantity'), $oil->__get('quantity'), $sparkplugs->__get('quantity'), $TotalAmount);


         ?>
         <button type="submit" class="btn btn-primary" onclick="window.location.href = 'OrderForm.php';"><i class="fas fa-arrow-left"></i> Go Back</button>

         <?php
         require_once('view-bob/footer.php');
          ?>
