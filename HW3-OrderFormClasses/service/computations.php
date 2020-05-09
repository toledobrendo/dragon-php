<?php
    function computeTotalOrderQuantity(&$tiresQty, &$oilQty, &$sparksPlugQty){
        $totalQty = $tiresQty + $oilQty + $sparksPlugQty;
        return $totalQty; 
    }

    function computeTotalAmount(&$tiresQty, &$oilQty, &$sparksPlugQty, &$tiresPrice, &$oilPrice, &$sparksPlugPrice){ 
        $tireAmount = @($tiresQty * $tiresPrice);
        $oilAmount = @($oilQty * $oilPrice);
        $sparkAmount = @($sparksPlugQty * $sparksPlugPrice);
        
        $total = $tireAmount + $oilAmount + $sparkAmount;
        
        return $total;
    }

    function computeVatableAmount(&$totalAmount){
        $vatableAmount = $totalAmount / 1.12; 
        return $vatableAmount; 
    }

    function computeVatAmount(&$vatableAmount){
        $vatAmount = @((float)($vatableAmount * .12)); 
        return $vatAmount; 
    }
?>