<?php
   class Person{
        public $name;
        protected $age;
        public static $is_human = 'yes';
        public function __construct(){
            echo '<p>Person constructed</p>';
        }

        public function setAge($age){
            return $this->age = $age;
        }

        public function getAge(){
            return $this->age;
        }

        public function __set($fieldname, $value){
            return $this->$fieldname = $value;
        }

        public function __get($fieldname){
            return $this->$fieldname;
        }

        public function introduce(){
            echo '<br/>This is '.$this->name;
        }

        public final function incrementAge(){
            $this->age += 1;
        }
    }
?>