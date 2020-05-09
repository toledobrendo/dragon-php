<?php
    define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);

    function saveOrder($tireQty, $oilQty, $sparkQty, $sales_total, $vat_amount){
        echo '<br/>'.DOCUMENT_ROOT;
        $file = @ fopen(DOCUMENT_ROOT.'/dragon-php/bobs-auto-parts/resource/orders.txt', 'ab');
        $date = date('H:i jS F Y');
        $outputString = $date."\t".' Tires: '.$tireQty ."\t".' Oil: '.$oilQty."\t"
                        .' Spark Plugs: '.$sparkQty ."\t".' Total Price: $'.$sales_total
                        ."\t".' VAT Amount: '.$vat_amount."\n";

        if(!$file){
            echo '<p><strong>Order could not be processed at this time please try again
                later.</strong></p>';
        } else {
            fwrite($file, $outputString, strlen($outputString));
            //flock($file, LOCK_EX) is used for locking file
            //flock($file, LOCK_UN) is used for unlocking file
            echo '<p><strong>Order successfully processed.</strong></p>';
        }

        fclose($file);
    }

    function readOrder(){
        $file = @ fopen(DOCUMENT_ROOT.'/dragon-php/bobs-auto-parts/resource/orders.txt', 'rb');

        try{
            if (!$file) {
                throw new FileNotFoundException('No orders pending. Please try again Later.');
            } else {
                while (!feof($file)) {
                    $order = fgets($file, 999);
                    echo $order . '<br/>';
                }
            }
        } catch(FileNotFoundException $fnfe){
            echo $fnfe;
        }

        fclose($file);
    }
?>