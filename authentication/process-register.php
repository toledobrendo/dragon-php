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
        <h6>Register Result</h6>
    </div>

    <?php
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hashedPassword = hash('sha512', $password);

        try {
            if(!$username || !$password){
                throw new Exception('Incomplete Input');
            }

            @$db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
            $dberror = mysqli_connect_errno();

            if ($dberror) {
                throw new Exception('Error: could not connect to database. Please try again later.' . ' ' . $dberror, 1);
            }

            $query = 'INSERT INTO user_info (username, password) VALUES (?,?)';
            $queryDuplicate = 'SELECT username FROM user_info WHERE username = ?';

            //login block
            $queryLogin = 'SELECT username FROM user_info WHERE username = ? AND password = ?';
            $stmtLogin = $db->prepare($queryLogin);
            $stmtLogin->bind_param("ss", $username, $password);
            //end of login block

            $stmtUserDuplicate = $db->prepare($queryDuplicate);
            $stmtUserDuplicate->bind_param("s", $username);
            $stmtUserDuplicate->execute();

            $duplicateResult = $stmtUserDuplicate->fetch();

            if ($duplicateResult == $username) {
                echo 'User: ' . $username . " is already in database.";
            } else {
                $stmtRegister = $db->prepare($query);
                $stmtRegister->bind_param("ss", $username, $hashedPassword);
                $stmtRegister->execute();

                echo "You have successfully registered a new account.";

                $stmtRegister->close();
            }
            $stmtUserDuplicate->close();

            mysqli_close($db);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    ?>

    <div class="card-footer">
        <a href="login.php" class="btn btn-secondary">Login</a>
    </div>
<?php
    require_once "view-comp/footer.php";
?>