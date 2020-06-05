<?php
  require_once 'view/header.php';
  require_once 'model/product-class-tires.php';
  require_once 'model/product-class.php';
  require_once 'model/product-class-oils.php';
  require_once 'model/product-class-spark-plugs.php';
?>

<?php

  $tireQty = $_POST['tireQty'] ? $_POST['tireQty'] : 0;
  $oilQty = $_POST['oilQty'] ? $_POST['oilQty'] : 0;
  $sparkQty = $_POST['sparkQty'] ? $_POST['sparkQty'] : 0;

  $product = new Product();
  $tires = new Tires();
  $oils = new Oils();
  $sparkPlugs = new SparkPlugs();
?>

  <h3 class="card-title">Purchased Items </h3>
  <?php echo "<div class = card-header>";
    echo '<p>Order Processed at ';
    echo date('H:i, jS F Y');
    echo '</p> </div>'; ?>
  <table class="table">
    <thead>
      <tr class="row">
        <th class="col-4">Item</th>
        <th class="col-4">Quantity</th>
        <th class="col-4">Price</th>
      </tr>
    </thead>
    <tbody>
      <tr class="row">
        <td class="col-4">TIRES </td>
        <td class="col-4"><?php echo  $tires->setTireItemQuantity($tireQty) .$tires->getTireItemQuantity(); ?> </td>
        <td class="col-4"><?php echo  $tires->computeTirePrice() .$tires->getComputeTirePrice(); ?> </td>
      </tr>
      <tr class="row">
        <td class="col-4">OILS </td>
        <td class="col-4"><?php echo  $oils->setOilItemQuantity($oilQty) .$oils->getOilItemQuantity(); ?> </td>
        <td class="col-4"><?php echo  $oils->computeOilPrice() .$oils->getComputeOilPrice(); ?> </td>
      </tr>
      <tr class="row">
        <td class="col-4">SPARK PLUGS </td>
        <td class="col-4"><?php echo  $sparkPlugs->setSparkPlugItemQuantity($sparkQty) .$sparkPlugs->getSparkPlugItemQuantity(); ?> </td>
        <td class="col-4"><?php echo  $sparkPlugs->computeSparkPlugPrice() .$sparkPlugs->getComputeSparkPlugPrice(); ?> </td>
      </tr>
    </tbody>
  </table>

<?php
  echo '</p> Total Price: '.$product->computeProductTotalAmount($tires->getComputeTirePrice() + $oils->getComputeOilPrice() + $sparkPlugs->getComputeSparkPlugPrice()) .$product->getProductTotalAmount();
  echo '</p> Total Quantity: '.$product->computeProductTotalQuantity($tires->getTireItemQuantity() + $oils->getOilItemQuantity() + $sparkPlugs->getSparkPlugItemQuantity());?>



<?php require_once 'view/footer.php';?>
