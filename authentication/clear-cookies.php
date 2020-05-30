
<?php
    session_start();
    require_once "view-comp/header.php";
    require_once "resources/db-properties.php";
?>

<?php
    setcookie('username', '', time() - 3600);
    setcookie('password', '', time() - 3600);
    setcookie('rememberMe', '', time() - 3600);
?>

<p><?php echo 'Cookies cleared' ?></p>

<?php
    require_once "view-comp/footer.php";
?>