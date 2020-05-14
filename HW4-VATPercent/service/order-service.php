<?php
    require_once('exception/file-not-found-exception.php'); 
    define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']); 

    function saveOrder($tireQty, $oilQty, $sparkQty, $totalAmount){
        echo '</br>'.DOCUMENT_ROOT; 
        
        $date = date('H:i jS F Y');
        $outputString = $date."\t"
            .$tireQty." tires\t"
            .$oilQty." oil\t"
            .$sparkQty." spark plugs\t"
            .'$'.$totalAmount."\n";
            
        $file = fopen(DOCUMENT_ROOT.'/dragon-php/bobs-auto-parts/resource/orders.txt', 'ab'); 
        
        //checks if the file is existing 
        if(!$file){
            echo '<br/><p><strong> Your order cannot be processed at this time. Please try again later</strong></p>'; 
        }
        else{
            //echo '<br/><p><strong> Order Processed.</strong></p>'; 
            flock($file, LOCK_EX); 
            fwrite($file, $outputString, strlen($outputString)); 
            flock($file, LOCK_UN); 
            fclose($file); 
        }
    }

    function getOrders(){
        
        try{
            @$file = fopen(DOCUMENT_ROOT.'/dragon-php/bobs-auto-parts/resource/orders.txt', 'rb'); 
        
            if(!$file){
                throw new FileNotFoundException('No orders pendings. Please try again later'); 
                //with no specified exception class: throw new Exception('<br/><p><strong> No orders pendings. Please try again later</strong></p>', 1);
                //echo '<br/><p><strong> No orders pendings. Please try again later</strong></p>'; 
            }
            else{
                //to print only specified line: $lineNum - 0; 

                while(!feof($file)){
                    $order = fgets($file, 999); 
                    //to print only specified line: if(lineNum==3)
                    //to print items with specified delimeters: $orderArr = explode("-", $order); 
                    //print items with a specied text: if(strpos($order, 'cindy')){
                    //to print items with specified delimeters: if(@trim($orderArr[1])=='tires'){
                    echo $order."<br/>"; 


                    //to print only specified line:  $lineNum++; 
                }; 
            }

            fclose($file); 
        }
        
        
        //with no specified exception class: catch(Exception $e){
        catch(FileNotFoundException $e){
            echo $e->getMessage(); 
            echo $e; 
        } 
    }

    function getVATPercent(){
        try{
            @$file = fopen(DOCUMENT_ROOT.'/dragon-php/HW4-VATPercent/resource/properties.txt', 'rb'); 
        
            if(!$file){
                throw new FileNotFoundException('No exisiting VAT percent value.'); 
            }
                
            else{

                while(!feof($file)){
                    $vatPercent = fgets($file, 999); 
                    $vatArr = explode("=", $vatPercent);
                    return $vatArr[1]; 
                }
            }

            fclose($file); 
        }
        
        catch(FileNotFoundException $e){
            echo $e->getMessage(); 
            echo $e; 
        } 
    }
?>