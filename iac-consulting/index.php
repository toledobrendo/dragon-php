<?php
	//include: reusing scripts, enables separation of functions, classes and behavior
	//include 'message.php'; 

	//require: results to fatal error when filename was not found
	//require('message.php'); 

	//require once: ensures that the script only runs once
	//this checks first if the filename is already imported
	//if yes-  importation will not push through
	require_once('message.php'); 
	require_once('model/person.php');
	require_once('model/employee.php');
	require_once('model/delivery-man.php');
	require_once('service/index-service.php');
	require_once('view-comp/header.php');
?>

<?php 
	echo @ $message;
	echo '<br/>URI: '. $_SERVER['REQUEST_URI'];
	$isValid = false;

	$baseNumber = 5;
	raiseToTwo($baseNumber);

	echo '<br/>Raised to two: '. $baseNumber;

	$person = new Person();
	$person->name = 'Emma';
	echo '<br/>Hello, '. $person->name. '!';
	$person->introduce();

	$person->setAge(12);
	echo '<br/>'. $person->name. ' is '. $person->getAge(). ' years old.';

	$person->address = 'Plant 3';
	echo '<br/>'. $person->name. ' lives in '. $person->address. ".";

	echo '<br/>Is human? '. (Person::$IS_HUMAN ? 'Yes': 'No');

	$employee = new Employee();
	$employee->name = 'Isabella';
	$employee->age = 30;
	$employee->incrementAge();

	echo '<br/>'. $employee->name. ' is '. $employee->getAge(). ' years old.';

	$employee->company = 'Grace Field';
	echo '<br/> Works at '. $employee->company;
	$employee->introduce();

	$delivery = new DeliveryMan();
	$delivery->moveTo('Capital');
?>

<?php if($isValid) { ?>
  <strong>This is valid.</strong>
<?php } ?>

<?php
  require_once('view-comp/footer.php');
?>