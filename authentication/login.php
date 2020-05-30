<?php
    if ($_SERVER["HTTPS"] != "on") {
        header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
        exit;
    }
    session_start();
    $username = isset($_COOKIE['username']) ? $_COOKIE['username'] : null;
    $password = isset($_COOKIE['password']) ? $_COOKIE['password'] : null;
    $rememberMe = isset($_COOKIE['rememberMe']) ? $_COOKIE['rememberMe'] : null;

    require_once "view-comp/header.php";
?>

<div class="card-header">
    <h6>Please Sign-in</h6>
</div>
<form class="form-signin" action="process-login.php" method="POST">
    <input type="text" id="username" name="username" class="form-control"
        placeholder="username" value="<?php $username ?>" required autofocus />
    <input type="password" id="password" name="password" class="form-control"
        placeholder="password" value="<?php $password ?>" required />
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" name="rememberMe" <?= isset($rememberMe)?'checked':'' ?> /> Remember me
        </label>
    </div>
    <?php
    if (isset($_GET['error'])) {
    ?>
        <div class="alert alert-danger">
            <?php echo $_GET['error'] ?>
        </div>
    <?php
    }
    ?>
    <div class="row">
        <a href="register.php" class="btn btn-lg btn-success btn-block col-6">Register</a>
        <button type="submit" class="btn btn-lg btn-primary col-6">Log in</button>
    </div>
</form>

<?php
    require_once "view-comp/footer.php";
?>