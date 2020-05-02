<?php
    require_once 'person.php';

    class Employee extends Person{

        private $company;

        public function __construct(){
            echo '<p>Employee constructed</p>';
        }

        public function __get($fieldname){
            return $this->$fieldname;
        }

        public function __set($fieldname, $value){
            return $this->$fieldname = $value;
        }

        public function introduce(){
            parent::introduce();
            echo '. From '.$this->company;
        }
    }
?>