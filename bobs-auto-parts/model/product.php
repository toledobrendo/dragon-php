<?php 
	class Product{
		public $name;
		protected $price;
		private $code;

		public function __get($fieldName){ 
			return $this->$fieldName;
		}

		public function __set($fieldName, $fieldValue){
			$this->$fieldName = $fieldValue;
		}
	}
?>