<?php 
  require_once('view-comp/header.php');
?>
          <h3 class="card-title">Order Form</h3>
          <form action="process-order.php" method="post">
            <table class="table">
              <thead>
                <tr class="row">
                  <th class="col-5">Item</th>
                  <th class="col-3">Price</th>
                  <th class="col-4">Quantity</th>
                </tr>
              </thead>
              <tbody>

                <?php 
                  $items = array(
                        array('Code' => 'tireQty', 'Description' => 'Tires', 'Price' => 100),
                        array('Code' => 'oilQty', 'Description' => 'Oil', 'Price' => 50),
                        array('Code' => 'sparkQty', 'Description' => 'Spark Plugs', 'Price' => 30)
                      );
                  for($ite1= 0; $ite1 < count($items); $ite1++){
                    
                      echo '<tr class="row">';
                      echo '  <td class="col-5">'.$items[$ite1]['Description'].'</td>';
                      echo '  <td class="col-3">'.$items[$ite1]['Price'].'</td>';
                      echo '  <td class="col-4">';
                      echo '   <input type="number" name="'.$items[$ite1]['Code'].'" maxlength="3" min="0" max="10" class="form-control"/>';
                      echo '  </td>';
                      echo '</tr>';
                    
                  }
                ?>


               <!--  <tr class="row">
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
                </tr> -->

                <!-- how -->
                 <tr class="row">
                    <td class="col-8">How did you find Bob's</td>
                    <td class="col-4">
                      <select name="find" class="custom-select">
                        <option value="regular">I'm a regular customer</option>
                        <option value="tv">TV advertising</option>
                        <option value="phone">Phone Directory</option>
                        <option value="mouth">Word of mouth</option>
                      </select>
                    </td>
                </tr>

                <!-- button -->
                <tr class="row">
                  <td colspan="2" class="col-12">
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </form>
<?php  
  require_once('view-comp/footer.php');
?>

        
