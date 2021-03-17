<?php
	require_once('model/tires.php');
	require_once('model/oil.php');
	require_once('model/spark-plug.php');

	$tires = new Tires();
	$oil = new Oil();
	$sparkPlug = new SparkPlug();

	$products = array($tires, $oil, $sparkPlug);
?>