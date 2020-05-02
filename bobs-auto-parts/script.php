<?php 

require_once('model/Tires.php');
require_once('model/Oil.php');
require_once('model/Spark.php');

$tires = new Tires();
$oil = new Oil();
$spark = new Spark();

$products = array($tires, $oil, $spark);
	
 ?>