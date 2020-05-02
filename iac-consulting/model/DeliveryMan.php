<?php 
require_once('Person.php');
require_once('Movable.php');

class DeliveryMan extends Employee implements Movable {
	public function moveTo($dest) {
		echo '<br/>Moving to '.$dest.'<br/>';
	}
}

 ?>