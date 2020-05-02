<?php 
require_once('Person.php');

class Employee extends Person {
	private $company;

	// setter and getter
	public function __set($fieldName, $fieldValue) {
		$this->$fieldName = $fieldValue;
	}
	public function __get($fieldName) {
		return $this->$fieldName;
	}

	// regular functions
	public function introduce() {
		parent::introduce();
		echo ' is from '.$this->$company;
	}
}

 ?>