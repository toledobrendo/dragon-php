<?php

	function TotalQuantity(&$tiresQty, &$oilQty, &$sparkQty){
		$totalQty=($tireQty+$oilQty+$sparkQty); 
		return $totalQty;
	}

	function TotalAmount(&$tireQty, &$oilQty, &$sparkQty, &$tirePrice, &$oilPrice, &$sparkPrice){
		$tireAmount=@($tiresQty* $tirePrice);
		$oilAmount=@($oilQty*$tirePrice);			
		$sparkAmount= @($sparkQty* $sparkPrice);

		$totalAmount= $tireAmount + $oilAmount + $sparkAmount;
		return $totalAmount;
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
