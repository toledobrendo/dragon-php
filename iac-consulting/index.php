<!DOCTYPE html>
<?php 
	// if file doesn't exist, no error
		//include('message.php');	
	// if file doesn't exist, return a fatal error
		//require('script.php'); 
	// only required ONCE
require_once('script.php');
require_once('message.php');
require_once('view-comp/header.php');
require_once('model/Person.php');
require_once('model/Employee.php');
require_once('model/DeliveryMan.php');
require_once('service/service.php');

	// Fatal error - forces the program to stop
?>
<?php 
echo @ $message;
echo $_SERVER['REQUEST_URI'];
$isValid = false;

$baseNumber = 5;
raiseToTwo($baseNumber);

echo '<br/>Raised to two: '.$baseNumber.'<br/>';

$person = new Person();
$person->name = 'Jm';
$person->age = 20;

echo '<br/>Hello '.$person->__get('name').'<br/>';

$person->__set('address', 'Las Piñas City');
echo '<br/>'.$person->__get('name').' lives in '.$person->__get('address').'<br/>';

$employee = new Employee();
$employee->name = "Chi";
$employee->age = 20;
echo '<br/>'.$employee->name.' is '.$employee->__get('age').' yr(s) old<br/>';
$employee->company = 'iACADEMY';
echo '<br/>'.$employee->name.' works at '.$employee->company.'<br/>';

$grabDriver = new DeliveryMan();
$grabDriver->moveTo('QC');
?>



<?php if($isValid) { ?>
	<strong>This is valid.</strong>
<?php } ?>


<?php 
echo $message;
?>	
