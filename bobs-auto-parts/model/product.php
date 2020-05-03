<?php

	class Product {
		protected $item, $name, $price, $description, $quantity, $cost, $code;

		public function __get($fieldName) {
			return $this->$fieldName;
		}

		public function __set($fieldName, $fieldValue) {
			return $this->$fieldName = $fieldValue;
		}

		function computeCost() {
			$this->cost = $this->price * $this->quantity;
		}
	}

?>