<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Process Order</title>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Order Result</h3>
                    <?php
                        define('TIRE_PRICE', 100);
                        define('OIL_PRICE', 50);
                        define('SPARK_PRICE', 30);

                        $tireQty = $_POST['TIRQty'] ?$_POST['TIRQty'] : 0;
                        $oilQty = $_POST['OILQty']?$_POST['OILQty'] :0;
                        $sparkQty = $_POST['SPKQty']?$_POST['SPKQty'] :0;
                        $totalQty = $tireQty + $oilQty + $sparkQty;

                        $find = $_POST['find'];

                        switch ($find) {
                            case 'regular':
                                echo 'Regular Customer';
                            break;
                            case 'tv':
                                echo 'From TV Advertising';
                            break;
                            case 'phone':
                                echo 'Phone Directory';
                            break;
                            case 'mouth':
                                echo 'From Word of Mouth';
                            break;
                            default:
                                echo 'Unknown Customer';
                            break;
                        }

                        $tire_price = @((float) $tireQty * TIRE_PRICE);
                        $oil_price = @((float) $oilQty * OIL_PRICE);
                        $spark_price = @((float) $sparkQty * SPARK_PRICE);
                        // $total_price = (float) $tire_price;
                        $total_price = (float) $tire_price + $oil_price + $spark_price;
                        $vat_total_price = $total_price/1.12;
                        $vat = 0.12 * $vat_total_price;

                        $sales_total = $vat + $vat_total_price;

                        //pass by reference sample
                        $other_total_amount = &$total_price;
                        $other_total_amount += $oil_price;
                        $total_price = (float) $spark_price;

                        // this is a test echo
                        //echo '$other_total_amount';
                        // echo '$total_amount'

                        echo '<p> Order processed at ';
                        echo date('H:i, jS F Y');
                        echo '<br><br>PRICE TABLE:';
                        echo '<br>Tire Price: Php ' .TIRE_PRICE;
                        echo '<br>Oil Price: Php ' .OIL_PRICE;
                        echo '<br>Spark Plug Price: Php ' .SPARK_PRICE;

                        //if-else block
                        if ($totalQty == 0) {
                            echo '<br><br>You didnt order anything<br>';
                        } else {
                            echo '<br><br>Your order is as follows(' . $totalQty . ' items): <br>';
                            if ($tireQty > 0)
                                echo $tireQty . ' tires. (Php ' . $tire_price . ') <br>';
                            if ($oilQty > 0)
                                echo $oilQty . ' bottles of oil. (Php ' . $oil_price . ') <br>';
                            if ($sparkQty > 0)
                                echo $sparkQty . ' spark plugs. (Php ' . $spark_price . ') <br>';
                        }

                        echo '<br>VATable Amount: Php ' . $vat_total_price . '</p>';
                        echo 'VAT Amount (12%): Php ' . $vat . '</p>';
                        echo 'Total: Php '. $sales_total.'</p>';
                        // echo '<br>Total: Php '.$total_price.'</p>';

                        echo 'Amount exceeded 500 but less than 1000?'.($vat_total_price>500 && $vat_total_price<1000?' Yes':' No').'<br>';

                        echo 'Is total amount string? '.(is_string($vat_total_price)? ' Yes': ' No');
                        echo '<br>Is total amount set?' .(isset($vat_total_price)? ' Yes': ' No');
                        echo '<br>Is total amonut 2 empty?' .(empty($other_total_amount)? ' Yes': ' No');
                        // PHP Comments
                        /**
                            Multiline comment wow
                         */
                    ?>
            </div>
            <div class="card-footer">
                <a class="btn btn-info" href="order-form.php">Go Back</a>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>