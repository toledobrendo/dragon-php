<?php 
// class
class Person {
	public $name;
	protected $age;
	private $address;

	public function __construct() {
		$this->name = "defaultname";
		echo '<p>The person has been constructed.';
	}

	// setter and getter
	public function __set($fieldName, $fieldValue) {
		$this->$fieldName = $fieldValue;
	}
	public function __get($fieldName) {
		return $this->$fieldName;
		// // you can filter what can be returned
		// if($fieldName !== 'address') {
		// 	return $this->$fieldName;
		// } else {
		// 	echo 'Access Denied.';
		// }
	}

	// regular functions
	public function introduce() {
		echo '<p>This is '.$this->name;
	}
	public final function incrementAge() {
		$this->$age += 1;
	}
}
 ?>
	