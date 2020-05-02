<?php
    define('TIRE_PRICE', 100); 
    define('OIL_PRICE', 50); 
    define('SPARK_PRICE', 30); 
?>

<?php
    require_once('view-comp/header.php')
?>

    <h3 class="card-title">Order Result</h3>
    <?php
        $tireQty = $_POST['tireQty'] ? $_POST['tireQty'] : 0;
        $oilQty = $_POST['oilQty'] ? $_POST['oilQty'] : 0;
        $sparkQty = $_POST['sparkQty'] ? $_POST['sparkQty'] : 0;
        $find = $_POST['find']; 

        echo 'Order processed at ';
        echo date('H:i, jS F Y');
        echo '<br><br>';

        switch($find){
            case 'regular';
                echo 'Regular Customer';
                break; 
            case 'tv';
                echo 'From TV advertisement';
                break; 
            case 'phone';
                echo 'From phone referral';
                break; 
            case 'mouth';
                echo 'From the word of mouth';
                break; 
            default:
                echo 'Unknown'; 
                break; 
        }


        echo '<br><br>'; 
        echo '<p>Prices<br/>'; 
        echo 'Tires: '.TIRE_PRICE.'<br/>'; 
        echo 'Oil: '.OIL_PRICE.'<br/>'; 
        echo 'Spark Plugs: '.SPARK_PRICE.'<br/>'; 

        $totalQty = @($tireQty + $oilQty + $sparkQty);
        if($totalQty < 1){
            echo'<br/>You didn\'t order anything!<br/>'; 
        }
        else{
            echo '<br/>Total Quantity: '.$totalQty.'<br/>';

            echo '<br>Your order is as follows: <br>';

            if($tireQty>0){
                echo $tireQty. ' tires.<br>';
            }

            if($oilQty>0){
                echo $oilQty . ' bottles of oil.<br>';
            }

            if($sparkQty>0){
                echo $sparkQty . ' spark plugs.<br>';
            }

        }


        echo '<br><br>';
        $tireAmount = @($tireQty * TIRE_PRICE);
        $oilAmount = @($oilQty * OIL_PRICE);
        $sparkAmount = @($sparkQty * SPARK_PRICE);

        $totalAmount = (float) $tireAmount;

        $otherTotalAmount = &$totalAmount;
        $otherTotalAmount += $oilAmount;
        $totalAmount += $sparkAmount;

        $vatableAmount = $totalAmount / 1.12; 
        $vatAmount = @((float)($vatableAmount * .12)); 
        $totalAmount = @((float)($vatableAmount + $vatAmount)); 

        //echo 'Other Total Amount: '.$otherTotalAmount.'<br/>';
        echo 'VATable Amount: '.$vatableAmount.'<br/>'; 
        echo 'VAT Amount (12%): '.$vatAmount.'<br/>'; 
        echo 'Total Amount: '.$totalAmount.'<br/>';

        echo '<br/>Amount exceeded 500 but less than 1000? '.($totalAmount > 500 && $totalAmount <1000 ? 'Yes' : 'No').'<br/>';

        echo 'Is $totalAmount string? '.(is_string($totalAmount) ? 'Yes' : 'No').'<br/>';

        unset($totalAmount);

        echo 'Is $totalAmount set? '.(isset($totalAmount) ? 'Yes' : 'No').'<br/>';

        $totalAmountTwo = 0;
        echo 'Is $totalAmountTwo set? '.(isset($totalAmountTwo) ? 'Yes' : 'No').'<br/>';
        echo 'Is $totalAmountTwo empty? '.(empty($totalAmountTwo) ? 'Yes' : 'No').'<br/>';
    ?>


    <div class="card-footer">
        <a class="btn btn-info" href="order-form.php">Go Back</a>
    </div>

<?php
    require_once('view-comp/footer.php')
?>