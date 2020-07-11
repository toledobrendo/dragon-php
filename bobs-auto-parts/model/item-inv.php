<?php

	define('TIRE_PRICE', 100);
	define('OIL_PRICE', 10);
	define('SPARK_PRICE', 5);
	

	// Note: These objects are not used in process-order.php and order-form.php
	$tire = new Product();
	$oil = new Product();
	$sparkPlugs = new Product();


	$tire->instantiate('Tires',TIRE_PRICE, 'tireQty');
	$oil->instantiate('Oil', OIL_PRICE, 'oilQty');
	$sparkPlugs->instantiate('Spark Plugs', SPARK_PRICE, 'sparkQty');


	$inventory = array($tire,$oil,$sparkPlugs);
 ?>