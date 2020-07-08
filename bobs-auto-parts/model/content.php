<?php

	class Product
	{
		
	  private $prodName;
	  private $price;
	  private $misc;
	  private $quantity;

		 public function __constructor(){
		   $quantity = 0;
		 }


		 public function instantiate($prodName, $price, $misc){
		    $this->prodName = $prodName;
		    $this->price = $price;
		    $this->misc = $misc;
		  }


		  public function __get($fieldName){
		    return $this->$fieldName;
		  }


		  public function __set($fieldName, $fieldValue){
		    $this->$fieldName = $fieldValue;
		  }


	}

?>
