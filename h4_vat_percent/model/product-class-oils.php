<?php
require_once 'product-class.php';
class Oils extends Product{
  //values from form
  private $oilItemQuantity;
  //computed value
  public $oilItemPrice;

  public function setOilItemQuantity($oilItemQuantity){
    $this->oilItemQuantity = $oilItemQuantity;
  }
  public function getOilItemQuantity(){
    return $this->oilItemQuantity;
  }

  public function computeOilPrice(){
    $OIL_PRICE = 50;
    $this->oilItemPrice = $OIL_PRICE * $this->oilItemQuantity;
  }

  public function getComputeOilPrice(){
    return $this->oilItemPrice;
  }

}

 ?>
