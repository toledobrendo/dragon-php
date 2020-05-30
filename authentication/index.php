<?php
    if(array_key_exists('HTTPS', $_SERVER) && $_SERVER["HTTPS"] == "on"){
        header("Location: http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);
        exit;
    }

    session_start();
    if(!isset($_SESSION['username'])){
        header('Location: login.php?error=Unauthorized access');
    }

    require_once "view-comp/header.php";
?>

<div class="card-header">
    <p><?php echo date('H:i, jS F Y') ?></p>
    <h6>Welcome, <?php echo $_SESSION['username'] ?></h6>
    <a href="process-logout.php" class="btn btn-primary">Logout</a>
    <a href="clear-cookies.php" class="btn btn-primary">Clear Cookies</a>
</div>

<?php
    require_once "view-comp/footer.php";
?>