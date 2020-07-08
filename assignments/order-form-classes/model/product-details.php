<?php
    require_once('model/product-variables.php');

    $tires = new Product(); 
    $tires->productName = "Tires"; 
    $tires->price = 100; 
    $tires->quantity = 0; 
    $tires->quantityName = "tireQty"; 

    $oil = new Product(); 
    $oil->productName = "Oil"; 
    $oil->price = 50; 
    $oil->quantity = 0; 
    $oil->quantityName = "oilQty";

    $sparksPlug = new Product(); 
    $sparksPlug->productName = "Sparks Plug"; 
    $sparksPlug->price = 30; 
    $sparksPlug->quantity = 0; 
    $sparksPlug->quantityName = "sparkQty";

    $products = array($tires, $oil, $sparksPlug);
    
?>