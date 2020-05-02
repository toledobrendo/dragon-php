<?php
require_once('view-bob/header.php');
 ?>
        <h1 class="card-title">Order Form</h1>

        <?php
        $items = array(
            array('Description'=> 'OIL', 'Price' =>10, 'Input' => '<input type="number" name="tireQty" maxlength="3" min="0" max="10" class="form-control"/>'),
            array('Description'=> 'Tires', 'Price' =>100, 'Input' =>'<input type="number" name="oilQty" maxlength="3" min="0" max="10" class="form-control"/>'),
            array('Description'=> 'Spark Plugs', 'Price' => 1000, 'Input' =>'<input type="number" name="spQty" maxlength="3" min="0" max="10" class="form-control"/>')
          );

          function compareItems($fir,$sec){
            if($fir['Price'] == $sec['Price']){
              return 0;
            }else if ($fir['Price'] > $sec['Price']){
              return 1;
            }else{
              return -1;
            }
          }

          usort($items,'compareItems');


        echo '<form action="process-order.php" method="post">
              <table class="table table-condensed">
              <thead>
              <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Quantity</th>
              </tr>
              </thead>';
        foreach ($items as $item) {
          echo '<tr>';
          foreach ($item as $field => $value) {
            echo '<td>'.$value.'</td>';
          }
          echo '</tr>';
        }
        echo '<tr>
              <td colspan="2">How did you find Bobs</td>
              <td>
                <select name="find" class="custom-select">
                  <option value="regular">Im a regular customer</option>
                  <option value="tv">TV advertising</option>
                  <option value="phone">Phone Directory</option>
                  <option value="mouth">Word of mouth</option>
                </select>
              </td>
              </tr>
              <tr>
                <td colspan = "2">
                  <a href="freight-cost.php" class="btn btn-secondary float-left" >Freight Cost</a>
                </td>
                <td>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
                </td>
              </tr>
              </table>';
         ?>

         <?php
         require_once('view-bob/footer.php');
          ?>
