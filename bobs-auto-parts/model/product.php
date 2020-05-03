<?php
  class Product {
    private $productID;
    private $productName;
    private $productPrice;
    private $quantity;

    public function __construct() {
      $productID = "";
      $productName = "";
      $productPrice = 0;
      $quantity = 0;
    }

    public function setProduct($id, $name, $price) {
      $this->productID = $id;
      $this->productName = $name;
      $this->productPrice = $price;
    }
  }
 ?>
