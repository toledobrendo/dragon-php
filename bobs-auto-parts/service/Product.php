<?php
  class Product {
    public $productName;
    public $productPrice;
    public $productQty;

    public function __construct() {
      $this->productName = 'Product';
      $this->productPrice = 0;
      $this->productQty = 'productQty';
    }

    public function setProductInfo($productName, $productPrice, $productQty) {
      $this->productName = $productName;
      $this->productPrice = $productPrice;
      $this->productQty = $productQty;
    }

    public function setProductName($productName) {
      return $this->productName = $productName;
    }

    public function getProductName() {
      return $this->productName;
    }

    public function setProductPrice($productPrice) {
      return $this->productPrice = $productPrice;
    }

    public function getProductPrice() {
      return $this->productPrice;
    }

    public function setProductQty($productQty) {
      return $this->productQty = $productQty;
    }

    public function getProductQty() {
      return $this->productQty;
    }
  }

  class OilProduct extends Product {
    public function __construct() {
      $this->productName = 'Oil';
      $this->productPrice = 50;
      $this->productQty = 'oilQty';
    }
  }

  class TireProduct extends Product {
    public function __construct() {
      $this->productName = 'Tires';
      $this->productPrice = 100;
      $this->productQty = 'tireQty';
    }
  }

  class SparkPlugProduct extends Product {
    public function __construct() {
      $this->productName = 'Spark Plugs';
      $this->productPrice = 30;
      $this->productQty = 'sparkPlugsQty';
    }
  }
?>
