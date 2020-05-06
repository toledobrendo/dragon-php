<?php
require_once('model/products.php');

$oil = new Product();
$oil->__set('item',"Oil");
$oil->__set('name',"Oilqty");
$oil->__set('price',10);;
$oil->__set('description','Oil');
$oil->__set('item',"Oil");
$oil->__set('code',"OIL");

$tires = new Product();
$tires->__set('item',"Tire");
$tires->__set('name',"Tireqty");
$tires->__set('price',100);
$tires->__set('description',"Tires");
$tires->__set('item',"Tire");
$tires->__set('code',"TIRE");

$sparkplugs = new Product();
$sparkplugs->__set('item',"Spark Plugs");
$sparkplugs->__set('name',"Sparkplugqty");
$sparkplugs->__set('price',1000);
$sparkplugs->__set('description',"Spark Plugs");
$sparkplugs->__set('item',"Spark Plug");
$sparkplugs->__set('code',"SPARKPLUG");

$items =array($oil ,$sparkplugs,$tires );
 ?>
