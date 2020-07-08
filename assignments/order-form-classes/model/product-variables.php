<?php
    class Product{
        
        public $productName;
        public $price; 
        public $quantity;
        public $quantityName; 
        
        public function __get($fieldName) {
            return $this->$fieldName;
        }

        public function __set($fieldName, $fieldValue) {
            $this->$fieldName = $fieldValue;
        }

}