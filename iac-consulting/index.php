<?php
	//calls or imports the message.php file twice
	// include('message.php'); //continues even if the file does not exist
	// require('message.php'); //throws and error if file is not found
	
	//ensures that the file is only imported once
	require_once('script.php');
	require_once('message.php');
	require_once('model/person.php');
	require_once('model/employee.php');
	require_once('model/delivery-man.php');
	require_once('service/index-service.php');
	require_once('view-comp/header.php');
?>
<?php 
	echo @$message;
	echo $_SERVER['REQUEST_URI'];
	$isValid = false;

	$baseNumber = 5;
	raiseToTwo($baseNumber);

	echo '<br> Raised to two: '. $baseNumber;

	$person = new Person();
	//arrow for accessing variables of functions of a class
	$person->name = 'Juan';
	echo '<br>'. $person->name;
	$person->introduce();

	$person->setAge(15);
	echo '<br>'. $person->name .' is '. $person->getAge() .' year(s) old';

	$person->address = 'Makati City';
	echo '<br>'. $person->name .' lives in '. $person->address;

	//double colon :: for accessing static variables 
	echo '<br>Is a Person human? '. (Person::$IS_HUMAN ? 'Yes' : 'No');

	$employee = new Employee();
	$employee->name = 'Pedro';
	$employee->age = 30;
	$employee->incrementAge();
	echo '<br>'. $employee->name .' is '. $employee->getAge() .' year(s) old';

	$employee->company = 'iACADEMY';
	echo '<br>'. $employee->name .' works at '. $employee->company;
	$employee->introduce();

	$grabDriver = new DeliveryMan();
	$grabDriver->MoveTo('Quezon City');
?>
<?php if($isValid) { ?>
	<strong>This is valid.</strong>
<?php } ?>
<?php
	require_once('view-comp/footer.php')
?>