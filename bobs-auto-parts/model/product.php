<?php
	class Product {
		protected $itemName;
		protected $qty;
		protected $price;

		public function __construct()
		{
			echo '<p>Product constructed';
		}

		public function __get($fieldName){
			return $this->$fieldName;
		}

		public function __set($fieldName, $fieldValue){
			$this->$fieldName = $fieldValue;
		}
	}
?>