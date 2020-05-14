<?php
    require_once('view/header.php');
    require_once('model/product-declarations.php');
    require_once('service/computations.php');
    require_once('service/order-service.php'); 
?>

    <h3 class="card-title">Order Result</h3>
    <?php
        $tires->quantity = $_POST['tireQty'] ? $_POST['tireQty'] : 0;
        $oil->quantity = $_POST['oilQty'] ? $_POST['oilQty'] : 0;
        $sparksPlug->quantity = $_POST['sparkQty'] ? $_POST['sparkQty'] : 0;
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
        echo 'Tires: Php '.$tires->price.'<br/>'; 
        echo 'Oil: Php '.$oil->price.'<br/>'; 
        echo 'Spark Plugs: Php '.$sparksPlug->price.'<br/>'; 

        $totalQty = @computeTotalOrderQuantity($tires->quantity, $oil->quantity, $sparksPlug->quantity); 

        if($totalQty < 1){
            echo'<br/>You didn\'t order anything!<br/>'; 
        }
        else{
            echo '<br/>Total Quantity: '.$totalQty.'<br/>';

            echo '<br>Your order is as follows: <br>';

            if($tires->quantity>0){
                echo $tires->quantity. ' tires.<br>';
            }

            if($oil->quantity>0){
                echo $oil->quantity . ' bottles of oil.<br>';
            }

            if($sparksPlug->quantity>0){
                echo $sparksPlug->quantity . ' spark plugs.<br>';
            }

        }

        echo '<br><br>';
        $totalAmount = @computeTotalAmount($tires->quantity, $oil->quantity, $sparksPlug->quantity,
                                          $tires->price, $oil->price, $sparksPlug->price); 
        $vatable = @computeVatableAmount($totalAmount); 
        $vat = @computeVatAmount($vatable); 

        echo 'VATable Amount: '.$vatable.'<br/>'; 
        echo 'VAT Amount (12%): '.$vat.'<br/>'; 
        echo 'Total Amount: '.$totalAmount.'<br/>';

        echo '<br/>Amount exceeded 500 but less than 1000? '.($totalAmount > 500 && $totalAmount <1000 ? 'Yes' : 'No').'<br/>';
        
        saveOrder($tires->quantity, $oil->quantity, $sparksPlug->quantity, $totalAmount); 

    ?>


    <div class="card-footer">
        <a class="btn btn-info" href="order-form.php">Go Back</a>
    </div>

<?php
    require_once('view/footer.php')
?>