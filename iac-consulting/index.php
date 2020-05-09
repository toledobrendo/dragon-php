<?php
    //include('message.php'); //kahit di nageexist file, tutuloy pa rin si lagyan ng @
    //    require('message.php'); //di gagana if di nageexist yung file, kahit i-suppress warning, di pa rin magpapakita yung page
    //    require_once('message.php'); //iisang beses lang iimport yung script
    
    require_once('message.php'); 
    require_once('script.php'); 
    require_once('model/person.php'); 
    require_once('model/employee.php');
    require_once('model/delivery-man.php');
    require_once('service/index-service.php'); 
    require_once('view-comp/header.php');
    
?>

<?php
    echo @ $message;
    $baseValue = 5; 
    raiseToTwo($baseValue); 

    echo '<br/>Raised to Two: '.$baseValue; 
    
    //instantiate
    $person = new Person(); 

    // $person.name ='Juan';  in java
    $person->name ='Juan'; // in php

    echo '<br/>Hello '.$person->name; 
    $person->introduce(); 

    $person->setAge(15); 
    echo '<br/>'.$person->name.' is '.$person->getAge().' years old.'; 
    
    //$person->age = '15';
    //echo '<br/>'.$person->name.' is '.$person->age.' years old.'; 

    $person->address = 'Makati City'; 
    echo '<br/>'.$person->name.' lives in '.$person->address; 

    echo '<br/>Is a Person human? '.(Person::$IS_HUMAN ? 'Yep' : 'Nope');

    $employee = new Employee(); 
    $employee->name = 'Cindy';
    $employee->age = 20;
    $employee->incrementAge();
    echo '<br/>'.$employee->name.' is '.$employee->age.' yr(s) old';
    $employee->company = 'iACADEMY';
    echo '<br/>'.$employee->name.' works at '.$employee->company;
    $employee->introduce();
    
    $grabDriver = new DeliveryMan();
    $grabDriver->moveTo('Quezon City');
?>

<?php
    require_once('view-comp/footer.php')    
?>