<?php 
require_once('Product.php');

class Spark extends Product {
	public function __construct() {
		$this->code = "SPK";
		$this->name = "Spark Plugs";
		$this->price = 30;
		$this->qtyId = "sparkQty";
		$this->qty = 0;
	}
}

 ?>