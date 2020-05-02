<?php
  require_once 'view-comp/title.php';
  $title = 'Checkout';
  require_once 'view-comp/header.php';

  define('TIRE_PRICE', 150);
  define('OIL_PRICE', 10);
  define('SPARK_PRICE', 5);
?>

<h3 class="card-title">Order Result</h3>
<?php
  echo '<p>Order Processed at ';
  echo date('H:i, jS F Y');
  echo '</p>';

  $tireQty = $_POST['tires'] ? $_POST['tires'] : 0;
  $oilQty = $_POST['oil'] ? $_POST['oil'] : 0;
  $sparkQty = $_POST['sparkplugs'] ? $_POST['sparkplugs'] : 0;
  $find = $_POST['find'];

  switch($find) {
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
      echo 'From Word of Mouth';
      break;
    default:
      echo 'Unknown Customer';
      break;
  }

  echo '<br/><br/>';
  echo '<p>Prices<br/>';
  echo 'Tires: '.TIRE_PRICE.'<br/>';
  echo 'Oil: '.OIL_PRICE.'<br/>';
  echo 'Spark Plugs: '.SPARK_PRICE.'<br/><br/>';

  $totalQty = @($tireQty + $oilQty + $sparkQty);

  if ($totalQty == 0) {
    echo 'You didn\'t order anything. <br/> <br/>';
  } else {
    echo '<p>Your order is as follows:</p>';
    if ($tireQty > 0)
      echo "$tireQty tires<br/>";
    if ($oilQty > 0)
      echo $oilQty.' oil<br/>';
    if ($sparkQty > 0)
      echo $sparkQty.' spark plugs<br/>';
    echo '<br/>';
  }
  echo 'Total Quantity: '.$totalQty.'<br/>';

  $tireAmount = @($tireQty * TIRE_PRICE);
  $oilAmount = @($oilQty * OIL_PRICE);
  $sparkAmount = @($sparkQty * SPARK_PRICE);

  $totalAmount = (float) $tireAmount;

  $otherTotalAmount = &$totalAmount;
  $otherTotalAmount += $oilAmount;
  $totalAmount += $sparkAmount;

  echo 'Other Total Amount: '.$otherTotalAmount.'<br/>';
  echo 'Total Amount: '.$totalAmount.'<br/>';

  $vatableAmount = $totalAmount / 1.12;
  $vat = $totalAmount - $vatableAmount;

  echo 'VATable Amount: '.$vatableAmount.'<br/>';
  echo 'VAT: '.$vat.'<br/>';
?>
</div>
<div class="card-footer">
<a class="btn btn-info" href="order-form.php">Go Back</a>

<?php require_once 'view-comp/footer.php'; ?>
