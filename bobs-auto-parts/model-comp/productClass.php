<?php
  class BobsProduct {
    private $productID;
    private $productName;
    private $productPrice;
    private $quantity;

    public function __construct() {
      $this->productID = "";
      $this->productName = "";
      $this->productPrice = 0;
      $this->quantity = 0;
    }

    public function __get($fieldName) {
      return $this->$fieldName;
    }

    public function setProduct($id, $name, $price) {
      $this->productID = $id;
      $this->productName = $name;
      $this->productPrice = $price;
    }
  }
 ?>