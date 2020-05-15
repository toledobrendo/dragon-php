<?php

  class Person{
    public static $IS_HUMAN = true;

    public $name;
    protected $age;
    private $address;



    public function getAge(){

      return $this->age;
    }


    public function setAge($age){
      $this->age = $age;
    }




    public function __construct(){

      echo '<p>Person Constructed';
    }




    public function __get($fieldName){
      if($fieldName !== 'address'){
        return $this->$fieldName;
      }else{
        return 'Access DENIED';
      }
      
    }


    public function __set($fieldName, $fieldValue){
     $this->$fieldName = $fieldValue;
    }





    public function introduce(){
        echo '<p>This is '.$this->name;
      }

    public final function incrementAge(){
      $this->age +=1;

    }





    }
?>