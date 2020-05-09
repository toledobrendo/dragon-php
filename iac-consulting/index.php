<?php
	require_once('message.php');
	require_once('script.php');
	require_once('view-comp/header.php');
	require_once('model/person.php');
	require_once('model/employee.php');
	require_once('model/delivery-man.php');
	require_once('service/service-index.php');
?>

<?php
	echo @ $message;
	echo $_SERVER['REQUEST_URI'];
	$isValid = false;

	$baseNumber = 5;
	raiseToTwo($baseNumber);

	echo '<br/>Raised to two: ' .$baseNumber;

	$person = new Person();
	$person->name = 'Juan';
	echo '<br/>Hello '.$person->name.'!';
	$person->introduce();

	$person->setAge(15);
	echo '<br/>'.$person->name.' is '.$person->getAge(). ' years old';

	$person->address = 'Makati City';
	echo '<br/>' .$person->name. ' lives in '.$person->address;

	echo '<br/>Is a Person human? '.(Person::$IS_HUMAN ? 'Yep' : 'Nope');

	$employee = new Employee();
	$employee->name = 'Pedro';
	$employee->age = 30;

	echo '<br/>'.$employee->name. ' is '.$employee->getAge(). ' years old';

	$employee->company = 'iACADEMY';
	echo '<br/>'.$employee->name.' works at '.$employee->company;

	$employee->introduce();

	$grabDriver = new DeliveryMan();
	$grabDriver-> moveTo('Quezon City');
?>

<?php
	if ($isValid) { ?>
		<strong>This is valid.</strong>
<?php  } 
?>

<?php
	require_once('view-comp/footer.php');
?>