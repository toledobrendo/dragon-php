<?php
	class Product {
		private $id;
		private $name;
		private $price;

		public function __construct($idValue, $nameValue, $priceValue) {
			$this->id = $idValue;
			$this->name = $nameValue;
			$this->price = $priceValue;
		}

		public function __get($property) {
			return $this->$property;
		}

		public function __set($property, $value) {
			$this->$property = $value;
		}
	}
?>