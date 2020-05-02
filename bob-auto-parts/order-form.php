  <?php
    require_once('defaults/header.php');
  ?>
            <h3 class="card-title"> ORDERFORM</h3>
            <form action="process-order.php" method="post">
              <table class="table">
<!--                 <thead>
                  <tr class="row">
                    <th class="col-5">Item</th>
                    <th class="col-4">Quantity</th>
                  </tr>
                </thead> -->
                <tbody>
                  <?php
                    $items = array(
                        array('itemName' => 'Oil','name'=>'tireQty','price'=>100),
                        array('itemName' => 'Tires','name'=>'oilQty','price'=>200),
                        array('itemName' => 'Spark Plugs','name'=>'sparkQty','price'=>300)
                      );

                     echo '<table class="table table-condensed">
                            <thead>
                            <tr>
                              <th class="col-5">Item</th>
                              <th class="col-4">Quantity</th>
                              <th class="col-2">Price</th>
                            </tr>
                            </thead>';
                    foreach ($items as $item) {
                        echo '<tr class="row">';
                          echo '<td class="col-5">'.$item['itemName'].'</td>';
                          echo '<td class="col-4">
                                   <input type="number" name="'.$item['name'].'" maxlength="3" min="0" max="10" class="form-control" /> 
                                </td>';
                          echo '<td class="col-2">'.$item['price'].'</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                  ?>

<!--                   <tr class="row">
                    <td class="col-5">Tires</td>
                    <td class="col-4">
                      <input type="number" name="tireQty" maxlength="3" min="0" max="10" class="form-control" />
                    </td>
                  </tr>
                  <tr class="row">
                    <td class="col-5">Oil</td>
                    <td class="col-4">
                      <input type="number" name="oilQty" maxlength="3" min="0" max="10" class="form-control" />
                    </td>
                  </tr>
                  <tr class="row">
                    <td class="col-5">Spark Plugs</td>
                    <td class="col-4">
                      <input type="number" name="sparkQty" maxlength="3" min="0" max="10" class="form-control" />
                    </td>
                  </tr> -->

                  <tr class="row">
                      <td class="col-5">How did you find Bob's</td>
                      <td class="col-5">
                        <select name="find" class="customer-select">
                          <option value="regular">I'm a regular customer</option>
                          <option value="tv">TV advertising</option>
                          <option value="phone">Phone Directory</option>
                          <option value="mouth">Word of mouth</option>
                        </select>
                      </td>
                  </tr>
                  <tr class="row">
                    <td colspan="2" class="col-6">
                      <a href="freight-cost.php" class="btn btn-secondary float-right"> Freight Cost</a>
                      <button type="submit" class="btn btn-success float-right">Submit</button>
                    </td>
                  </tr>

                </tbody>
              </table>
            </form>
  			</div>
  		</div>
  	</div>
 
  <?php
    require_once('defaults/footer.php');
  ?>