<?php
  require_once('productClass.php');

  class BobsProductList {
    private $products;
    //include this if customer name is needed
    //private $customerName;


    public function __construct() {

      $this->products = array();
      
      $products_prices = [];
      $products_prices['Tire'] = 100;
      $products_prices['Oil'] = 20;
      $products_prices['Spark Plug'] = 50;
      
      foreach ($products_prices as $name => $price) {
        $product = new BobsProduct();
        $product->setProduct(trim(preg_replace('/\s+/', '', $name)), $name, $price);
        array_push($this->products, $product);
      }
    }

    public function getTotalProducts() {
      return count($products);
    }

    public function __get($fieldName) {
      return $this->$fieldName;
    }
  }
 ?>
