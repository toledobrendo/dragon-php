<?php
    if($_SERVER["HTTPS"]!="on"){
        header("Location: https://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);
        exit;
    }
    session_start();

    require_once "view-comp/header.php";
?>

    <div class="card-header">
        <h6>Register</h6>
    </div>
    <form action="process-register.php" method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="username" required autofocus />
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <!-- regex[upper,lower,number,minimum8] => (?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,} -->
            <input type="password" id="password" name="password" class="form-control"
                pattern=".{8,}" title="Must contain at least 8 or more characters"
                placeholder="password" value="<?php $password ?>" required />
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form>

<?php
    require_once "view-comp/footer.php";
?>