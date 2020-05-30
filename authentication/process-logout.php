<?php
    session_start();
    require_once "view-comp/header.php";
    require_once "resources/db-properties.php";
?>

<?php
    session_destroy();
    header("Location: login.php");
?>

<?php
    require_once "view-comp/footer.php";
?>