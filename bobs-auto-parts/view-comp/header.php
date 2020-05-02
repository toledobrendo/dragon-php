<?php
	require_once('model/product.php');
?>

<html>

<head>
	<title> Freight Cost </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

	<div class="container">
		<div class ="card">

			<div class="card-body">

			<?php

				$oil = new Product();
				$oil->__set('item', "Oil");
				$oil->__set('name', "oilQty");
				$oil->__set('price', 10);
				$oil->__set('description', 'cans of oil');

				$tires = new Product();
				$tires->__set('item', "Tires");
				$tires->__set('name', "tireQty");
				$tires->__set('price', 100);
				$tires->__set('description', 'tires');

				$sparkplugs = new Product();
				$sparkplugs->__set('item', "Spark Plugs");
				$sparkplugs->__set('name', "sparkQty");
				$sparkplugs->__set('price', 4);
				$sparkplugs->__set('description', 'spark plugs');

				$items = array($oil, $tires, $sparkplugs);

			?>
