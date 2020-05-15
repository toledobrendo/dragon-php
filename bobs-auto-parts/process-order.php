<?php
require_once('dependency/header.php');
require_once('models/product.php');
require_once('objects/items.php');
require_once('util/vat-service.php');
/*
Inside the process_order.php script, load the value of VAT_PERCENT into a constant.
*/

define('VAT_RATE', getVatRate());
?>
<h3 class="card-title">Order Result</h3>
<?php
/* Get Data */
$_POST['tireQty'] ? $products[0]->__set('qty', $_POST['tireQty']) : $products[0]->__set('qty', 0);
$_POST['oilQty'] ? $products[1]->__set('qty', $_POST['oilQty']) : $products[1]->__set('qty', 0);
$_POST['sparkQty'] ? $products[2]->__set('qty', $_POST['sparkQty']) : $products[2]->__set('qty', 0);
/* Process Data */
$totalPrice = 0;
foreach($products as $product){
  $totalPrice += $product->computeCost();
}
// @(float) ($tireQty * TIRE_PRICE) + ($oilQty * OIL_PRICE) + ($sparkQty * SPARK_PRICE);
$vatAble = $totalPrice / (1 + VAT_RATE);
$vatAmnt = $vatAble * VAT_RATE;
/* Print */
echo "<p>Order Processed at ";
echo date("H:i, jS F Y");
echo "</p>";
echo "Your order is as follows<br><br>";
echo $products[0]->__get('qty')." tires.<br>";
echo $products[1]->__get('qty')." bottles of oil.<br>";
echo $products[2]->__get('qty')." spark plugs.<br><br>";
echo "Vatable Amount: $vatAble<br>";
echo "VAT Amount (12%): $vatAmnt<br>";
echo 'Total Amount: ' . $totalPrice . '<br/><br/>';
echo 'Total Price exceeded 500 but less than 1000? ' . ($totalPrice > 500 && $totalPrice < 1000 ? 'Yes' : 'No') . '<br/>';
?>
</div>
<div class="card-footer">
  <a class="btn btn-info" href="order-form.php">Back to home</a>
  <?php require_once('dependency/footer.php'); ?>