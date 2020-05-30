<?php
// Try to maintain a consistent naming convention
require_once('view-bob/header.php');
require_once('controller/productObjects.php');
 ?>
        <h1 class="card-title">Order Form</h1>

        <?php


        echo '<form action="process-order.php" method="post">
              <table class="table table-condensed">
              <thead>
              <tbody>
              <tr class="row">
                <th class="col-4">Item</th>
                <th class="col-3">Price</th>
                <th class="col-5">Quantity</th>
              </tr>
              </thead>
              <tbody>';
              foreach($items as $item) {
      							echo '<tr class="row">';
      							echo '<td class="col-4">'.$item->__get('item').'</td>';
      							echo '<td class="col-3">'.$item->__get('price').'</td>';
      							echo '<td class="col-5"> <input type="number" name="'.$item->__get('name').'" max="10" min="0" maxLength="3" class="form-control"> </th>';
      							echo '</tr>';
      						}

        echo '<tr class="row">
              <td class = "col-4">How did you find Bobs</td>
              <td class="col-3"></td>

              <td class="col-5">
                <select name="find" class="custom-select">
                  <option value="regular">Im a regular customer</option>
                  <option value="tv">TV advertising</option>
                  <option value="phone">Phone Directory</option>
                  <option value="mouth">Word of mouth</option>
                </select>
              </td>


              </tr>
              <tr class="row">
                <td class="col-4">
                  <a href="freight-cost.php" class="btn btn-secondary float-left" >Freight Cost</a>
                </td>
                <td class="col-3"></td>
                <td class="col-5" >
                <button type="submit" class="btn btn-primary float-right">Submit</button>
                </td>
              </tr>
              </tbody>
              </table>';
         ?>

         <?php
         require_once('view-bob/footer.php');
          ?>
