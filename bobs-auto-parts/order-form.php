<?php
    require_once 'view-comp/header.php';
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
                            //Array Activity
                            $items = array(
                                array('Code' => 'OIL', 'Description' => 'Oil', 'Price' => 50),
                                array('Code' => 'TIR', 'Description' => 'Tires', 'Price' => 100),
                                array('Code' => 'SPK', 'Description' => 'Spark Plugs', 'Price' => 30)
                            );
                            echo '<tr class="row">';

                            foreach ($items as $item) {
                                echo '<td class="col-5">' . $item['Description'] . '</td>';
                                echo '<td class="col-3">' . $item['Price'] . '</td>';
                                echo '<td class="col-4">';
                                echo '<input type="number" class="form-control" name="' . $item['Code'] . '" maxlength="3" min="0" />';
                                echo '</td>';
                            }
                            echo '</tr>';
                            ?>
                            <!-- <tr class="row">
                                <td class="col-5">Tires</td>
                                <td class="col-4">
                                    <input type="number" class="form-control" name="tireQty" maxlength="3" min="0" max="10" />
                                </td>
                            </tr>
                            <tr class="row">
                                <td class="col-5">Oil</td>
                                <td class="col-4">
                                    <input type="number" class="form-control" name="oilQty" maxlength="3" min="0" max="10" />
                                </td>
                            </tr>
                            <tr class="row">
                                <td class="col-5">Spark Plugs</td>
                                <td class="col-4">
                                    <input type="number" class="form-control" name="sparkQty" maxlength="3" min="0" max="10" />
                                </td>
                            </tr> -->
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