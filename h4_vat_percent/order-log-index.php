<?php
  require_once 'service/order-log-service.php';
  require_once 'view/header.php';
?>

<?php
  echo '<h1>Order List</h1>';
  getOrders();
?>


<?php require_once 'view/footer.php';?>
