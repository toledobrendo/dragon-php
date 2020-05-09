<?php
  require_once 'model/product.php';

  $products = array(
    'tires' => new Product('Tires',150, 0),
    'oil' => new Product('Oil', 10, 0),
    'sparkplugs' => new Product('Spark Plugs', 5, 0));
?>
