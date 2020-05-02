<?php
	require_once('view-comp/header.php');
	require_once('model/deliveryman.php');	
	require_once('service/index-service.php');
?>

	<div class="container">
		<div class ="card">
			<div class="card-body">
				<?php

					echo @ $message;
					echo'<br/>';
					echo '<i>'.$_SERVER['REQUEST_URI'].'</i>';
					echo'<br/>';
					$isValid = false;

					$baseNumber = 5;
					echo '<br/><i>Base Number:</i> '.$baseNumber.'<br/>';

					raiseToTwo($baseNumber);
					echo '<i>Raised to Two:</i> '.$baseNumber;

					// person object
					$person = new Person();
					$person->name = 'S.Coups';
					echo '<br/><br/>Hello, <i>'.$person->name.'!</i>';
					$person->setAge(24);
					echo '<p>Age: '.$person->getAge();
					$person->__set('address', "Daegu, South Korea");
					echo '<br/>'.$person->name.' lives in '.$person->__get('address');
					echo '<br/>Is he human? <i>'.Person::$isHuman.'</i>';
					echo $person->introduce();

					// employee object
					$employee = new Employee();
					$employee->name = "Woozi";
					$employee->setAge(23);
					$employee->__set('address', "Busan, South Korea");
					$employee->__set('company', "S.COUPS Entertainment");

					echo '<br/><br/>'.$employee->name.' is '.$employee->getAge().' years old';
					echo '<br/>He works at <i>'.$employee->__get('company').'</i>';
					echo $employee->introduce();

					// deliveryman object
					$grabdriver = new DeliveryMan();
					$grabdriver->moveTo("Conti's Bakeshop");

				?>
			</div>
		</div>
	</div>

<?php
	require_once('view-comp/footer.php');
?>