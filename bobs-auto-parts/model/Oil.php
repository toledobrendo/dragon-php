<?php 

	require_once('Product.php');

	class Oil extends Product {
		public function __construct() {
			$this->code = "OIL";
			$this->name = "Oil";
			$this->price = 50;
			$this->qtyId = "oilQty";
			$this->qty = 0;
		}
	}
	
 ?>