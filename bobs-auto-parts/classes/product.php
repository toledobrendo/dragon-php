<?php 
	class Product
	{
		private $name, $price, $qty;
		public function __construct($name, $price){
			$this->name = $name;
			$this->price = $price;
		}
		public function __get($fieldName){
			return $this->$fieldName;
		}
		public function __set($fieldName, $fieldValue){
			$this->$fieldName = $fieldValue;
		}
		public function getTotalPrice(){
			return $this->price * $this->qty;
		}
	}
?>