<?php
    class Product{
        private $code;
        private $description;
        private $price;

        public function setCode($code){
            return $this->code = $code;
        }

        public function getCode(){
            return $this->code;
        }

        public function setDescription($description){
            return $this->description = $description;
        }

        public function getDescription(){
            return $this->description;
        }

        public function setPrice($price){
            return $this->price = $price;
        }

        public function getPrice(){
            return $this->price;
        }

        public function __set($fieldname, $value){
            return $this->$fieldname = $value;
        }

        public function __get($fieldname){
            return $this->$fieldname;
        }
    }
?>