<?php
  require_once('product.php');

  class ProductList {
    private $products;
    //include this if customer name is needed
    //private $customerName;


    public function __construct() {
      //Initialize the items in Bob's auto parts here
      $this->products = array();
      //temporary list of products and prices
      $products_prices = [];
      $products_prices['Tire'] = 100;
      $products_prices['Oil'] = 20;
      $products_prices['Spark Plug'] = 50;
      // $products_prices['Screw'] = 5;
      // $products_prices['Chair'] = 2000;
      // $products_prices['Radio'] = 5000;
      // $products_prices['Mirror'] = 50;
      //add more products here
      //this will affect all of the pages who implements product-list

      foreach ($products_prices as $name => $price) {
        $product = new Product();
        $product->setProduct(trim(preg_replace('/\s+/', '', $name)), $name, $price);
        //pushes the object product to the array
        array_push($this->products, $product);
      }
    }

    public function getTotalProducts() {
      return count($products);
    }

    //not yet needed
    // public function setQuantity($qtyArray) {
    //   $ite = 0;
    //   foreach($qtyArray as $productID => $quantity) {
    //     foreach ($products as $item) {
    //       if($item->productID == $productID) {
    //         $item->quantity = $quantity;
    //         break;
    //       }
    //     }
    //   }
    // }

    public function __get($fieldName) {
      return $this->$fieldName;
    }
  }
 ?>
