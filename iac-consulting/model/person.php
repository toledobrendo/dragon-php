<?php

  class Person{
    public $name;
    protected $age;
    private $address;



    public function getAge(){

      return $this->age;
    }


    function setAge($age){
      $this->age = $age;
    }




    public function __construct(){

      echo '<p>Person Constructed';
    }




    public function __get($fieldName){
      return $this->$fieldName;
    }


    public function __set($fieldName, $fieldValue){
     $this->$fieldName = $fieldValue;
    }





    public function introduce(){
        echo '<p>This is '.$this->name;
      }





    }






 
?>