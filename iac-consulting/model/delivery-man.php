<?php
    require_once 'employee.php';
    require_once 'interfaces/movable.php';

    class DeliveryMan extends Employee implements Movable{

        public function __construct(){
            echo '<p>DeliveryMan constructed</p>';
        }

        function moveTo($destination){
            echo '<br/>Moving to '.$destination; 
        }
    }
?>