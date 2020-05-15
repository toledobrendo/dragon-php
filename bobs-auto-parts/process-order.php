<?php 
  require_once('view-comp/header.php');
  require_once('model-comp/productClass.php');
  require_once('model-comp/productListClass.php');
  require_once('service-comp/order-service.php');
  require_once('service-comp/vat-service.php');

  define('VAT_PERCENT', readVatFile());
?>
  <h3 class="card-title">Order Result</h3>
<?php
  $boughtList = new BobsProductList();
  echo '<p><b>Order Processed at </b>';
  echo date('H:i, jS F Y');
  echo '</p>';
  $find = $_POST['find'];
    switch($find) {
      case 'regular':
        echo '<b>Regular Customer</b>';
        break;
      case 'tv':
        echo '<b>From TV Advertising<b>';
        break;
      case 'phone':
        echo '<b>From Phone Directory<b>';
        break;
      case 'mouth':
        echo '<b>From Word of Mouth<b>';
        break;
       default:
        echo '<b>Unknown Customer<b>';
        break;
    }

  echo '<hr>';
            
  $totalAmount = 0;
  $tireQty = 0;
  $oilQty = 0;
  $sparkQty = 0;

  echo '<table>';
    foreach ($boughtList->products as $item) {
      echo '<tr>';
      echo '<td>'.$_POST[$item->productID.'QTY'].'</td>';
      echo '<td><b>'.$item->productName.'(s)</b></td>';
      echo '<td> @ '.round($item->productPrice, 2).'.00 </td>';
      echo '</tr>';
      $totalAmount += $item->productPrice * $_POST[$item->productID.'QTY'];
    }
            
  echo '</table>';

  saveOrder($boughtList, $totalAmount);

  echo '<hr>';

  getOrders();

  if($totalAmount != 0 && VAT_PERCENT != 0){
    $vatableAmount = $totalAmount / (1 + VAT_PERCENT);
    $vat = $totalAmount - $vatableAmount;
  }

  echo '<table>';
  echo '<tr><td><b>Total Amount: </b><td>';
  echo '<td>'.round($totalAmount, 2).'.00</td></tr>';
  echo '<tr><td><b>VATable Amount: </b><td>';
  echo '<td>'.round($vatableAmount, 2).'</td></tr>';
  echo '<tr><td><b>VAT: </b><td>';
  echo '<td>'.round($vat, 2).'</td></tr>';

  echo '<tr><td><b>Amount exceeded 500? </b><td>';
  echo '<td>'.($totalAmount > 500 ? 'Yes' : 'No').'</td></tr>';
  echo '</table>';
?>
  </div>
  <div class="card-footer">
    <a class="btn btn-info" href="order-form.php">Go Back</a>
<?php 
  require_once('view-comp/footer.php');
?>        