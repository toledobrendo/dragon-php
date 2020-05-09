<?php
    class Product{
        protected $productName;
        protected $price; 
        protected $quantity;
        protected $quantityName; 
        
        public function __get($fieldName) {
            return $this->$fieldName;
        }

        public function __set($fieldName, $fieldValue) {
            $this->$fieldName = $fieldValue;
        }
    }
?>