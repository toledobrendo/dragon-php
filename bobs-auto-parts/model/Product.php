<?php 

class Product {
	protected $code;
	protected $name;
	protected $price;
	protected $qtyId;
	protected $qty;

	// setter and getter
	public function __set($fieldName, $fieldValue) {
		$this->$fieldName = $fieldValue;
	}
	public function __get($fieldName) {
		return $this->$fieldName;
	}
}

 ?>