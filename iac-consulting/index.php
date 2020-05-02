<?php
    require_once 'script.php';
    require_once 'message.php';
    require_once 'view-comp/header.php';
    require_once 'service/index-service.php';
    require_once 'model/delivery-man.php';
    require_once 'model/employee.php';
    require_once 'model/person.php';
?>

<?php

    echo $message;
    echo '<br/>'.$_SERVER['REQUEST_URI'];
    $isValid = false;

    $baseNumber = 5;
    raiseToTwo($baseNumber);

    echo '<br/>Raise to 2: ' . $baseNumber;

    $person = new Person();
    $person->name = 'Fred';
    $person->age = 21;

    echo '<br/>Hello'.$person->name.'!';

    $person->introduce();
    echo '<br/>Person Age: '.$person->age;

    echo '<br/>Is a Person Human? '.(Person::$is_human)?'yes':'no';

    $employee = new Employee();
    $employee->name = 'Viktor';
    $employee->age = 71;
    $employee->incrementAge();

    echo '<br/>Employee Age: '.$employee->age;

    $employee->company = 'iACADEMY';
    $employee->introduce();

    $grabDriver = new DeliveryMan();
    $grabDriver->moveTo("Makati");
?>

<?php if ($isValid) { ?>
    <br/><strong>This is valid.</strong>
<?php } ?>

<?php
require_once 'view-comp/footer.php'
?>