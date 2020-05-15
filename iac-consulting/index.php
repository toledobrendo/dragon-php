<?php
  //include 'message.php';
  require_once ('script.php');
  require_once('message.php');
  require_once('model/person.php');
  require_once('service/index-service.php');
  require_once('view-comp/header.php');


?>




<?php

    echo @ $message;
    echo $_SERVER ['REQUEST_URI'];
    $isValid =  false;


    $baseNumber = 5;
    raiseToTwo($baseNumber);

    echo '<br/>Raised to two: '.$baseNumber;

    $person = new Person();
    $person->name = 'Chris';
    echo '<br/>Hello '.$person->name.'!';
    $person->introduce();


    $person->setAge(15);

    echo '<br/>'.$person->name.' is'.$person->getAge().'yr(s) old';


    $person->address = 'Makati City';

    echo '<br/>'.$person->name.'Lives in'.$person->address;
?>
          


<?php if($isValid) { ?>
    
  <strong>This is valid.</strong>
 <?php } ?>


<?php
  require_once('view-comp/foster.php');
?>