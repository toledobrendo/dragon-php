<?php
require_once('dependency/header.php');
define('TIRE_PRICE', 100);
define('OIL_PRICE', 100);
define('SPARK_PRICE', 100);
define('VAT_RATE', .12);
define('VATABLE_RATE', 1.12);
?>
<h3 class="card-title">Order Result</h3>
<?php
/* Get Data */
$tireQty = $_POST['tireQty'];
$oilQty = $_POST['oilQty'];
$sparkQty = $_POST['sparkQty'];
/* Process Data */
$totalPrice = @(float) ($tireQty * TIRE_PRICE) + ($oilQty * OIL_PRICE) + ($sparkQty * SPARK_PRICE);
$vatAble = @(float) $totalPrice / VATABLE_RATE;
$vatAmnt = @(float) VAT_RATE * ($totalPrice / VATABLE_RATE);
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
echo 'Total Amount: ' . $totalPrice . '<br/><br/>';
echo 'Total Price exceeded 500 but less than 1000? ' . ($totalPrice > 500 && $totalPrice < 1000 ? 'Yes' : 'No') . '<br/>';
?>
</div>
<div class="card-footer">
  <a class="btn btn-info" href="order-form.php">Back to home</a>
  <?php require_once('dependency/footer.php'); ?>