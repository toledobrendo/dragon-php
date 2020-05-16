<?php 

	require_once('Product.php');

	class Tires extends Product {
		public function __construct() {
			$this->code = "TIR";
			$this->name = "Tires";
			$this->price = 100;
			$this->qtyId = "tireQty";
			$this->qty = 0;
		}
	}

 ?>