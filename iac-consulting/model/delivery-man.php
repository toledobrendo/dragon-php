<?php
	require_once('employee.php');
	require_once('interfaces/movable.php');

	class DeliveryMan extends Employee implements Movable {
		public function moveTo($dest) {
			echo '<br/>Moving to '.$dest;
		}
}
?>