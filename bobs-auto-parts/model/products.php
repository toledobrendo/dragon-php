<?php
 class Product{
  protected $name, $description,$item,$price,$cost,$quantity,$code;

  public function __get($fieldName) {
      return $this->$fieldName;
  }

  public function __set($fieldName, $fieldValue) {
    $this->$fieldName = $fieldValue;
  }
  function totalCost(){
    $this->cost =$this->quantity * $this->price;
  }
}
 ?>
