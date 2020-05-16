<?php
    require_once 'view-comp/header.php';
    require_once 'model/product.php';
?>
                <h3 class="card-title">
                    <h1>Order Form</h1>
                </h3>
                <form action="process-order.php" method="POST">
                    <table class="table">
                        <thead>
                            <tr class="row">
                                <th class="col-5">Item Name</th>
                                <th class="col-3">Price</th>
                                <th class="col-4">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Note: Class variables should be in camelCase. Code, Description and Price are undeclared in product.php
                                $productOil = new Product();
                                $productOil->code = "OIL";
                                $productOil->description = "Oil";
                                $productOil->price = 50;

                                $productTire = new Product();
                                $productTire->code = "TIR";
                                $productTire->description = "Tires";
                                $productTire->price = 100;

                                $productSpark = new Product();
                                $productSpark->code = "SPK";
                                $productSpark->description = "Spark Plugs";
                                $productSpark->price = 30;

                                $items = array($productOil, $productTire, $productSpark);

                                echo '<tr class="row">';

                                foreach ($items as $item) {
                                    echo '<td class="col-5">' . $item->description . '</td>';
                                    echo '<td class="col-3">' . $item->price . '</td>';
                                    echo '<td class="col-4">';
                                    echo '<input type="number" class="form-control" name="' . $item->code . '" maxlength="3" min="0" />';
                                    echo '</td>';
                                }
                                echo '</tr>';
                            ?>

                            <tr class="row">
                                <td class="col-5">How did you find Bob's?</td>
                                <td class="col-7">
                                    <select name="find" class="custom-select">
                                        <option value="regular">I'm a regular customer</option>
                                        <option value="tv">TV Advertising</option>
                                        <option value="phone">Phone Directory</option>
                                        <option value="mouth">Word of Mouth</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="row">
                                <td colspan="2" class="col-12">
                                    <a href="freight-cost.php" class="btn btn-secondary float-right">Freight Cost</a>
                                    <button type="submit" class="btn btn-primary float-right">SUBMIT</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
<?php
    require_once 'view-comp/footer.php';
?>
