<?php
require_once 'product-class.php';
class Tires extends Product{
  //values from form
  private $tireItemQuantity;
  //computed value
  public $tireItemPrice;

  public function setTireItemQuantity($tireItemQuantity){
    $this->tireItemQuantity = $tireItemQuantity;
  }
  public function getTireItemQuantity(){
    return $this->tireItemQuantity;
  }

  public function computeTirePrice(){
    $TIRE_PRICE = 100;
    $this->tireItemPrice = $TIRE_PRICE * $this->tireItemQuantity;
  }

  public function getComputeTirePrice(){
    return $this->tireItemPrice;
  }




}

 ?>
