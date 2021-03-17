<?php
	require_once('product.php');

	class Oil extends Product {
		public function __construct(){
			$this->itemName = 'Oil';
			$this->qty = 'oilQty';
			$this->price = '50';
		}
	}
?>