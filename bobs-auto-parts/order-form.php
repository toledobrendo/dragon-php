<?php

  require_once('view/header.php');
  require_once('model/content.php');
  require_once('model/item-inv.php');

?>
          <h3 class="card-title">Orderform</h3>
          <form  action="process-order.php" method="post">
            <table class = "table">
              <thead>
                <tr class="row">
                  <th class="col-5">Items</th>
                  <th class="col-4">Quantity</th>
                  <th class="col-2">Price</th>


                </tr>
              </thead>
              <tbody>

                <?php
                  $products = array(array('desc' => 'Tires', 'name' => 'tireQty','price' => 100 ),
                                    array('desc' => 'Oil', 'name' => 'oilQty','price' => 200 ),
                                    array('desc' => 'Spark Plugs', 'name' => 'sparkQty','price' => 300 ));


                  foreach($inventory as $products){
                    echo '<tr class="row">

                            <td class="col-4">'.$products->prodName.'
                            </td>

                            <td class="col-4">'.$products->price.'
                            </td>

                            <td class="col-4">
                              <input type="number" name="'.$products->misc.'"  min="0" class="form-control"/>
                            </td>

                          </tr>';
                  }

                ?>



                <!-- MEETING 4 UPDATE-COMMENTED/DELETED THIS PART -->
                <!-- What kind of wheel is always 
                <tr class="row">
                  <td class="col-5"> Tires</td>
                  <td class="col-4">
                    <input type="text" name="tireQty" maxlength="3" min="0" max="10" class="form-control">
                  </td>
                </tr>



                <tr class="row">
                  <td class="col-5"> Oil</td>
                  <td class="col-4">
                    <input type="text" name="oilQty" maxlength="3" min="0" max="10" class="form-control">
                  </td>
                </tr>



                <tr class="row">
                  <td class="col-5"> Spark Plugs </td>
                  <td class="col-4">
                    <input type="text" name="sparkeQty" maxlength="3" min="0" max="10" class="form-control">
                  </td>
                </tr> -->


                <!-- //NEW CODE AREA:1 modified:4/26=================== -->
                <tr class="row">
                  <td class="col-5">How did you find Bob's builder</td>
                    <td class="col-4">
                      <select name="find" class="custom-select">
                        <option value="regular">I'm a regular customer</option>
                        <option value="tv">TV advert</option>
                        <option value="phone">Phone Directory</option>
                        <option value="mouth">Word of Mouth</option>
                      </select>
                    </td>
                </tr>
                <!-- //=============================== -->

                <!-- SUBMIT BUTTON -->
                <tr class="row">
                  <td colspan="2" class="col-9">
                    <a href="freight-cost.php" class="btn btn-secondary float-right">Freight Cost</a>
                    <button type="submit" class="btn btn-primary float-right"> Submit </button>
                  </td>

                </tr>
              </tbody>
            </table>
          </form>


<?php
  require_once('view/footer.php');
?>