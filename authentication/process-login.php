<?php
    if($_SERVER["HTTPS"]!="on"){
        header("Location: https://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);
        exit;
    }
    session_start();

    require_once "view-comp/header.php";
    require_once "resources/db-properties.php";
?>

    <div class="card-header">
        <h6>Login Result</h6>
    </div>

    <?php
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hashedPassword = hash('sha512', $password);

        if(isset($_POST['rememberMe'])){
            $rememberMe = $_POST['rememberMe'];

            setcookie('username', $username, time() + 3600);
            setcookie('password', $password, time() + 3600);
            setcookie('rememberMe', $rememberMe, time() + 3600);
        }
        try {
            if(!$username || !$password){
                throw new Exception('Incomplete credentials');
            }

            @$db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
            $dberror = mysqli_connect_errno();

            if ($dberror) {
                throw new Exception('Error: could not connect to database. Please try again later.' . ' ' . $dberror, 1);
            }

            $queryLogin = 'SELECT username FROM user_info WHERE username = ? AND password = ?';
            $stmtLogin = $db->prepare($queryLogin);
            $stmtLogin->bind_param("ss", $username, $hashedPassword);
            $stmtLogin->execute();
            $loginResult = $stmtLogin->get_result();

            if($loginResult->fetch_assoc()){
                $_SESSION['username'] = $username;
                header('location: index.php');
            } else {
                throw new Exception('incorrect credentials');
            }

            $stmtLogin->close();

            mysqli_close($db);
        } catch (Exception $e) {
            header('location: login.php?error='.$e->getMessage());
        }
    ?>

<?php
    require_once "view-comp/footer.php";
?>