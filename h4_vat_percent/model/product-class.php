<?php
class Product{
  public $productTotalQuantity;
  public $productTotalAmount;

  public function computeProductTotalQuantity($productItemQuantity){
    return $this->productTotalQuantity += $productItemQuantity;
  }

  public function computeProductTotalAmount($productItemPrice){
    $this->productTotalAmount += $productItemPrice;
  }

  public function setProductTotalAmount($productItemPrice){
     return $this->productTotalAmount = $productItemPrice;
  }

  public function getProductTotalAmount(){
    return $this->productTotalAmount;
  }


}
 ?>

 <!-- public function computeProductTotalAmount(){
   $this->productTotalAmount += $this->productTotalAmount;
 } -->


 <!-- public function setTireQuantity($tireQty){
   return $this->tireQty = $tireQty;
 }
 public function getTireQuantity(){
   return $this->tireQty;
 }

 public function setOilQuantity($oilQty){
   return $this->oilQty = $oilQty
 }
 public function getOilQuantity(){
   return $this->oilQty;
 }

 public function setSparkPlugQuantity($sparkQty){
   return $this->sparkQty = $sparkQty;
 }
 public function getSparkPlugQuantity(){
   return $this->sparkQty;
 }


 //Computed Variables
 public $productTotalQty;
 public $productAmount;

 public function ComputeProductTotalQuantity(){
     $this->productTotalQty = @($this->tireQty * $this->oilQty * $this->sparkQty);
 }

 //lagay sa switch na corresponds to the product
 public function ComputeProductAmount($quantity){

 } -->
