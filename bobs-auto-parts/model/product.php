<?php
    class Product{
        public function __set($fieldname, $value){
            return $this->$fieldname = $value;
        }

        public function __get($fieldname){
            return $this->$fieldname;
        }
    }
?>