<?php 

	require_once('model/person.php');
	
	class Employee extends Person {

		private $company;

		public function introduce() {
			parent::introduce();
			echo ' from <i>'.$this->company.'</i>';
		}

		public function __get($fieldName) {
			return $this->$fieldName;
		}

		public function __set($fieldName, $fieldValue) {
			return $this->$fieldName = $fieldValue;
		}
	}
?>