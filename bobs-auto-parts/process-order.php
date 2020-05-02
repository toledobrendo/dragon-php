<?php
    require_once 'view-comp/header.php';
?>
                <h3 class="card-title">Order Result</h3>
                    <?php
                        define('TIRE_PRICE', 100);
                        define('OIL_PRICE', 50);
                        define('SPARK_PRICE', 30);

                        $tireQty = $_POST['TIR'] ?$_POST['TIR'] : 0;
                        $oilQty = $_POST['OIL']?$_POST['OIL'] :0;
                        $sparkQty = $_POST['SPK']?$_POST['SPK'] :0;
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
                        $total_price = (float) $tire_price + $oil_price + $spark_price;
                        $vat_total_price = $total_price/1.12;
                        $vat = 0.12 * $vat_total_price;

                        $sales_total = $vat + $vat_total_price;

                        $other_total_amount = &$total_price;
                        $other_total_amount += $oil_price;
                        $total_price = (float) $spark_price;

                        echo '<p> Order processed at ';
                        echo date('H:i, jS F Y');
                        echo '<br><br>PRICE TABLE:';
                        echo '<br>Tire Price: Php ' .TIRE_PRICE;
                        echo '<br>Oil Price: Php ' .OIL_PRICE;
                        echo '<br>Spark Plug Price: Php ' .SPARK_PRICE;

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

                        echo 'Amount exceeded 500 but less than 1000?'.($vat_total_price>500 && $vat_total_price<1000?' Yes':' No').'<br>';

                        echo 'Is total amount string? '.(is_string($vat_total_price)? ' Yes': ' No');
                        echo '<br>Is total amount set?' .(isset($vat_total_price)? ' Yes': ' No');
                        echo '<br>Is total amonut 2 empty?' .(empty($other_total_amount)? ' Yes': ' No');
                    ?>
<?php
    require_once 'view-comp/footer.php';
?>