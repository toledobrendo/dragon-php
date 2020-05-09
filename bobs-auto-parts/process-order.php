<?php
  require_once 'view-comp/title.php';
  $title = 'Checkout';

  require_once 'view-comp/header.php';
  require_once 'data/products.php';
?>

<h3 class="card-title">Order Result</h3>
<?php
  echo '<p>Order Processed at ';
  echo date('H:i, jS F Y');
  echo '</p>';

  foreach ($products as $code => $data) {
    $data->quantity = $_POST[$code] ? $_POST[$code] : 0;
  }
  $find = $_POST['find'];

  switch($find) {
    case 'regular': echo 'Regular Customer'; break;
    case 'tv': echo 'From TV Advertising'; break;
    case 'phone': echo 'From Phone Directory'; break;
    case 'mouth': echo 'From Word of Mouth'; break;
    default: echo 'Unknown Customer'; break;
  }

  echo '<br/><br/>';
  echo '<p>Prices<br/>';
  foreach ($products as $code => $data) {
    echo "$data->name: $data->price <br/>";
  }
  echo '<br/>';

  $totalQty = 0;
  foreach ($products as $code => $data) {
    $totalQty += $data->quantity;
  }

  if ($totalQty == 0) {
    echo 'You didn\'t order anything. <br/> <br/>';
  } else {
    echo '<p>Your order is as follows:</p>';
    foreach ($products as $code => $data) {
      if($data->quantity > 0) {
        echo "$data->quantity $data->name<br/>";
      }
    }
    echo '<br/>';
  }
  echo 'Total Quantity: '.$totalQty.'<br/>';

  $basePrice = 0;

  foreach ($products as $code => $data) {
    $basePrice += $data->quantity * $data->price;
  }

  echo "Base Price: $basePrice<br/>";

  $vat = $basePrice * .12;
  echo "VAT: $vat<br/>";

  $totalPrice = $basePrice + $vat;
  echo "Total Price: $totalPrice<br/>";
?>
</div>
<div class="card-footer">
<a class="btn btn-info" href="order-form.php">Go Back</a>

<?php require_once 'view-comp/footer.php'; ?>
