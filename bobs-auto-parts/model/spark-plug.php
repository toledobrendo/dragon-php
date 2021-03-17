<?php
	require_once('product.php');

	class SparkPlug extends Product {
		public function __construct(){
			$this->itemName = 'Spark Plugs';
			$this->qty = 'sparkQty';
			$this->price = '30';
		}
	}
?>