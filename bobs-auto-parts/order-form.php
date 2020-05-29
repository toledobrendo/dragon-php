<?php
  require_once('view-comp/header.php');
  require_once('model/product.php');
?>

<h3 class="card-title">Order Form</h3>
<form action="process-order.php" method="post">

<?php

  // Note: These objects should be discoverable in process-order.php
  $tires = new Product();
  $tires->name = 'Tires';
  $tires->price = 100;
  $tires->code = 'tireQty';

  $oil = new Product();
  $oil->name = 'Oil';
  $oil->price = 50;
  $oil->code = 'oilQty';

  $sparkPlugs = new Product();
  $sparkPlugs->name = 'Spark Plugs';
  $sparkPlugs->price = 30;
  $sparkPlugs->code = 'sparkQty';

  // $items = array(
  //   array('Item' => 'Tires', 'Price' => 100, 'Name' => 'tireQty'),
  //   array('Item' => 'Oil', 'Price' => 50, 'Name' => 'oilQty'),
  //   array('Item' => 'Spark Plugs', 'Price' => 30, 'Name' => 'sparkQty')
  // );

  $items = array($tires, $oil, $sparkPlugs);

  echo '<table class="table table-condensed">
  <thead>
  <tr>
  <th>Item</th>
  <th>Price</th>
  <th>Quantity</th>
  </thead>';


  foreach ($items as $item) {
    echo '<tr>';
    echo '<td>' . $item->name. '</td>';
    echo '<td>' . $item->price. '</td>';
    echo '<td><input type="number" name="' . $item->code. '" maxlength="3" min="0" max="10" class="form-control"/></td>';
    echo '</tr>';
  }

  echo '</table>';

  ?>

            <!-- <table class="table">
              <thead>
                <tr class="row">
                  <th class="col-5">Item</th>
                  <th class="col-4">Quantity</th>
                </tr>
              </thead>
              <tbody>
                <tr class="row">
                  <td class="col-5">Tires</td>
                  <td class="col-4">
                    <input type="number" name="tireQty" maxlength="3" min="0" max="10" class="form-control"/>
                  </td>
                </tr>
                <tr class="row">
                  <td class="col-5">Oil</td>
                  <td class="col-4">
                    <input type="number" name="oilQty" maxlength="3" min="0" max="10" class="form-control"/>
                  </td>
                </tr>
                <tr class="row">
                  <td class="col-5">Spark Plugs</td>
                  <td class="col-4">
                    <input type="number" name="sparkQty" maxlength="3" min="0" max="10" class="form-control"/>
                  </td>
                </tr>

                <tr class="row">
                  <td class="col-5">How did you find Bob's?</td>
                  <td class="col-4">
                    <select name="find" class="custom-select">
                      <option value="regular">I'm a regular customer</option>
                      <option value="tv">TV Advertising</option>
                      <option value="phone">Phone Directory</option>
                      <option value="mouth">Word of Mouth</option>
                    </select>
                  </td>
                </tr> -->

                <tr class="row">
                  <td colspan="2" class="col-9">
                    <a href="freight-cost.php" class="btn btn-secondary float-right">Freight Cost</a>
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </form>
        </div>
      </div>
      
<?php
  require_once('view-comp/footer.php');
?>