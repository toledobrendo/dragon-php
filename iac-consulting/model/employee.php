<?php
	require_once('person.php');

	class Employee extends Person{
		private $company;

		public function __get($fieldName){
			return $this->$fieldName;
		}

		public function __set($fieldName, $fieldValue){
			$this->$fieldName=$fieldValue;
		}
	
		public function introduce(){
			parent::introduce();
			echo ' from '.$this->company;
		}

		
	}


?>
