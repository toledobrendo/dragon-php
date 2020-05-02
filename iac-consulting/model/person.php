<?php

	class Person {
		public $name;
		protected $age;
		protected $address;
		public static $isHuman = 'yes';

		public function __construct() {
			echo '<br/>Person Constructed';
		}

		public function setAge($age) {
			return $this->age = $age;
		}

		public function getAge() {
			return $this->age;
		}

		public function introduce() {
			echo '<br/>This is '.$this->name;
		}

		public function __get($fieldName) {
			if ($fieldName == 'address') {
				return $this->$fieldName;
			} else {
				return 'Access Denied.';
			}
			
		}

		public function __set($fieldName, $fieldValue) {
			return $this->$fieldName = $fieldValue;
		}

		public final function incrementAge() {
			$this->age +=1;
		}

	}

?>