<?php
require_once 'product-class.php';
class SparkPlugs extends Product{
  //values from form
  private $sparkPlugItemQuantity;
  //computed value
  public $sparkPlugItemPrice;

  public function setSparkPlugItemQuantity($sparkPlugItemQuantity){
    $this->sparkPlugItemQuantity = $sparkPlugItemQuantity;
  }
  public function getSparkPlugItemQuantity(){
    return $this->sparkPlugItemQuantity;
  }

  public function computeSparkPlugPrice(){
    $SPARK_PLUGS_PRICE = 30;
    $this->sparkPlugItemPrice = $SPARK_PLUGS_PRICE * $this->sparkPlugItemQuantity;
  }

  public function getComputeSparkPlugPrice(){
    return $this->sparkPlugItemPrice;
  }




}

 ?>
