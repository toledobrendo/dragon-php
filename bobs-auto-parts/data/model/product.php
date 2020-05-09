<?php
  class Product {
    private $name;
    private $price;
    private $quantity;

    public function __construct($name, $price, $quantity)
    {
      $this->name = $name;
      $this->price = $price;
      $this->quantity = $quantity;
    }

    public function __get($field) {
      return $this->$field;
    }

    public function __set($field, $value) {
      return $this->$field = $value;
    }
  }
?>
