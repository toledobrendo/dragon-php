<?php
    require_once('view/header.php');
    require_once('model/product-declarations.php');
?>
      <h3 class="card-title">Order Form</h3>
      <form action="process-order.php" method="post">
            <table class="table">

                <thead>
                    <tr class="row">
                        <th class="col-4">Item</th>
                        <th class="col-3">Price</th>
                        <th class="col-5">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                        foreach($products as $item){
                          echo '<tr class="row">';
                          echo '  <td class="col-4">'.$item->productName.'</td>';
                          echo '  <td class="col-3">'.$item->price.'</td>';
                          echo '  <td class="col-5">';
                          echo '   <input type="number" name="'.$item->quantityName.'" maxlength="3" min="0" max="10" class="form-control"/>';
                          echo '  </td>';
                          echo '</tr>';

                        }
                    ?>
                    <tr class="row">
                        <td class="col-6">How do you find our shop?</td>
                        <td class="col-6">
                            <select name="find" class="custom-select">
                                <option value="regular">I'm a regular customer.</option>
                                <option value="tv">TV advertising.</option>
                                <option value="phone">Phone directory.</option>
                                <option value="mouth">Word of Mouth.</option>
                            </select>
                        </td>
                    </tr>

                    <tr class="row">
                        <td colspan="2" class="col-12">
                            <a href="freight-cost.php" class="btn btn-secondary float right">Freight Cost</a>
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </td>
                    </tr>

                </tbody>
                
                </table>
          </form>
<?php
    require_once('view/footer.php')
?>