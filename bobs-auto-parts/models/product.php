<?php 
    class Product{
        private $code;
        private $description;
        private $price;
        private $qty;
        public function __construct($code, $description, $price){
            $this->code = $code;
            $this->description = $description;
            $this->price = $price;
        }
        public function __get($name){
            return $this->$name;
        }
        public function __set ($variableName, $value){
            $this->$variableName = $value;
        }
        public function computeCost(){
            return $this->__get('price') * $this->__get('qty');
        }
    }
?>