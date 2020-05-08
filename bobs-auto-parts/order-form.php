<?php 
  require_once('view-comp/header.php');
  require_once('model-comp/productClass.php');
  require_once('model-comp/productListClass.php');
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
                  $itemsList = new BobsProductList();

                  foreach ($itemsList->products as $item) {
                      echo '<tr class="row">';
                      echo '<td class="col-4">'.$item->productName.'</td>';
                      echo '<td class="col-4">'.$item->productPrice.'</td>';
                      echo '<td class="col-4"> <input type="number" name="'.$item->productID.'QTY" max="10" min="0" maxLength="3" class="form-control" placeholder=0 required> </td>';
                      echo '</tr>';
                    }
                ?>

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

        
