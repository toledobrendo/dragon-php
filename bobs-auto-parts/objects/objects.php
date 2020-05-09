<?php
	require_once('model/product.php');

	$oil = new Product();
	$oil->__set('item', "Oil");
	$oil->__set('name', "oilQty");
	$oil->__set('price', 150);
	$oil->__set('description', 'cans of oil');
	$oil->__set('code', 'OIL');

	$tires = new Product();
	$tires->__set('item', "Tires");
	$tires->__set('name', "tireQty");
	$tires->__set('price', 100);
	$tires->__set('description', 'tires');
	$tires->__set('code', 'TIR');

	$sparkplugs = new Product();
	$sparkplugs->__set('item', "Spark Plugs");
	$sparkplugs->__set('name', "sparkQty");
	$sparkplugs->__set('price', 15);
	$sparkplugs->__set('description', 'spark plugs');
	$sparkplugs->__set('code', 'SPK');

	$items = array($oil, $tires, $sparkplugs);

?>