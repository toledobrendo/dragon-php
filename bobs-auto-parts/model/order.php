<?php
  require_once('product.php');

  class Order {
    private Product $products;
    //include this if customer name is needed
    //private $customerName;


    public function __construct() {
      //Initialize the items in Bob's auto parts here

      //temporary list of products and prices
      $products_prices = [];
      array_push($products_prices, 'Tires'=>100);
      array_push($products_prices, 'Oil'=>20);
      array_push($products_prices, 'Spark Plugs'=>50);
      //add more products here

      foreach ($products_prices as $name => $price) {
        Product $product;
        $product->setProduct(trim(preg_replace('/\s+/', ' ', $name), $name, $price);
        //pushes the object product to the array
        array_push($products, $product);
      }
    }

    public function getTotalProducts() {
      return count($products);
    }

    public function setQuantity($qtyArray) {
      $ite = 0;
      for($qtyArray as $productID => $quantity) {
        foreach ($products as $item) {
          if($item->productID == $productID) {
            $item->quantity = $quantity;
            break;
          }
        }
      }
    }
  }
 ?>
