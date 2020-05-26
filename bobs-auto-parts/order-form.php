<?php require_once("service/Product.php") ?>
<?php require_once("view-comp/header.php") ?>
          <h3 class="card-title">Order Form</h3>
          <form action="process-order.php" method="post">
            <table class="table">
              <thead>
                <tr class="row">
                  <th class="col-5">Item</th>
                  <th class="col-4">Price</th>
                  <th class="col-3">Quantity</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  // This could be in a separate php script
                  $products = array(
                    new TireProduct(),
                    new OilProduct(),
                    new SparkPlugProduct()
                  );

                  foreach ($products as $product) {
                    echo '<tr class="row">';
                    echo '  <td class="col-5">'.$product->getProductName().'</td>';
                    echo '  <td class="col-4">Php '.$product->getProductPrice().'</td>';
                    echo '  <td class="col-3">';
                    echo '    <input type="number" name="'.$product->getProductQty().'" maxlength="3" min="0" max="10" class="form-control">';
                    echo '  </td>';
                    echo '</tr>';
                  }
                ?>

                <tr class="row">
                  <td class="col-5">How did you find Bob's</td>
                  <td class="col-4"></td>
                  <td class="col-3">
                    <select name="find" class="custom-select">
                      <option value="regular">I'm a regular customer.</option>
                      <option value="tv">TV advertisment.</option>
                  </td>
                </tr>

                <tr class="row">
                  <td class="col-12">
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </form>
<?php require_once("view-comp/footer.php") ?>
