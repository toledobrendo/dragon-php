<?php
require_once('dependency/header.php');
require_once('models/product.php');
require_once('objects/items.php')
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
            <!-- Do things -->
            <?php
            foreach ($products as $product) {
                // Note: $product->description would work as well
                echo '<tr class="row">';
                echo '<td class="col-5">' . $product->__get('description') . '</td>';
                echo '<td class="col-3">' . $product->__get('price') . '</td>';
                echo '<td class="col-4"><input type="number" name="' . $product->__get('code') . 'Qty" maxlength="3" min="0" max="10" class="form-control"></td>';
                echo '</tr>';
            }
            ?>
            <tr class="row">
                <td class="col-5">How did you find Bob's?</td>
                <td class="col-7">
                    <select name="find" class="custom-select">
                        <option value="regular">I'm a regular customer</option>
                        <option value="tv">TV Advertising</option>
                        <option value="phone">Phone Directory</option>
                        <option value="mouth">Word of mouth</option>
                    </select>
                </td>
            </tr>
            <tr class="row">
                <td colspan="2" class="col-9">
                    <a href="../index.php" class="btn btn-danger float-right">Go Back</a>
                    <a href="freight-cost.php" class="btn btn-secondary float-right">Freight Cost</a>
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </td>
            </tr>
        </tbody>
    </table>
</form>
<?php require_once('dependency/footer.php'); ?>
