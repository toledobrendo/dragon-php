<?php
	require_once('product.php');

	class Tires extends Product {
		public function __construct(){
			$this->itemName = 'Tires';
			$this->qty = 'tireQty';
			$this->price = '100';
		}
	}
?>