<?php

	require_once('model/product.php');

	$oil = new Product();
	$oil->__set('item', "Oil");
	$oil->__set('name', "oilQty");
	$oil->__set('price', 10);
	$oil->__set('description', 'cans of oil');
	$oil->__set('code', 'OIL');

	$tires = new Product();
	$tires->__set('item', "Tires");
	$tires->__set('name', "tireQty");
	$tires->__set('price', 100);
	$tires->__set('description', 'tires');
	$tires->__set('code', 'TIR');

	$sparkPlugs = new Product();
	$sparkPlugs->__set('item', "Spark Plugs");
	$sparkPlugs->__set('name', "sparkQty");
	$sparkPlugs->__set('price', 4);
	$sparkPlugs->__set('description', 'spark plugs');
	$sparkPlugs->__set('code', 'SPK');

	$items = array($oil, $tires, $sparkPlugs);

?>
