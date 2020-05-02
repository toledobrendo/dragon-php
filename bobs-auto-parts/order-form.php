<?php
  require_once 'view-comp/title.php';
  $title = 'Order Form';
  require_once 'view-comp/header.php';
?>
<h3 class="card-title">Order Form</h3>
<form action="process-order.php" method="post">
  <table class="table">
    <thead>
      <tr class="row">
        <td class="col-4">Item</td>
        <td class="col-4">Price</td>
        <td class="col-4">Quantity</td>
      </tr>
    </thead>
    <tbody>
      <?php
        $products = array(
          'tires' => array('desc' => 'Tires', 'price' => 150, 'quantity' => 0),
          'oil' => array('desc' => 'Oil', 'price' => 10, 'quantity' => 0),
          'sparkplugs' => array('desc' => 'Spark Plugs', 'price' => 5, 'quantity' => 0));

        foreach ($products as $code => $data) {
          echo '<tr class="row">';
          echo '<td class="col-4">'.$data['desc'].'</td>';
          echo '<td class="col-4">'.$data['price'].'</td>';
          echo '<td class="col-4">';
          echo '<input class="form-control" type="number" name="'.$code.'" min="0" value="'.$data['quantity'].'" required>';
          echo "</td></tr>";
        }
      ?>

      <tr class="row">
        <td class="col-8">How did you find Bob's</td>
        <td class="col-4">
          <select name="find" class="custom-select">
            <option value="regular">I'm a Regular Customer</option>
            <option value="tv">TV Advertising</option>
            <option value="phone">Phone Directory</option>
            <option value="mouth">Word of Mouth</option>
          </select>
        </td>
      </tr>

      <tr class="row">
        <td colspan="2" class="col-12">
          <a href="freight-cost.php" class="btn btn-secondary float-left">Freight Cost</a>
          <button type="submit" class="btn btn-primary submit float-right" name="button">Submit</button>
        </td>
      </tr>
    </tbody>
  </table>
</form>
<?php require_once 'view-comp/footer.php'; ?>
