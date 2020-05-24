<?php require_once 'view-comp/header.php'; ?>
<div class="card-header">
    <h3 class="card-title">Add Author Result:</h3>
</div>
<div class="card-body">
    <?php
        $authorName = $_POST['authorName'];

        try {
            if (!$authorName) {
                throw new Exception('You have not entered an author name. Please go back and try again', 0);
            }

            @$db = new mysqli('192.168.2.73:3306', 'user', 'asd123', 'php_lesson_db');
            $dberror = mysqli_connect_errno();

            if ($dberror) {
                throw new Exception('Error: could not connect to database. Please try again later.' . ' ' . $dberror, 1);
            }

            $queryAuthor = 'INSERT INTO author (name) VALUES (?)';
            logMessage($queryAuthor);

            //prepare and bind query
            $stmtAuthor = $db->prepare($queryAuthor);
            $stmtAuthor->bind_param("s", $authorName);

            //execute query
            $stmtAuthor->execute();

            $affectedRows = $stmtAuthor->affected_rows;
            if($affectedRows>0){
                echo $affectedRows . " author inserted into database.";
            } else {
                throw new Exception('Error: the author was not added.');
            }

            //close query
            $stmtAuthor->close();

            //close db connection
            mysqli_close($db);
        } catch (Exception $e) {
            error_log($e->getMessage());
            echo $e->getMessage();
            echo '<br/><a href="javascript:history.go(-1)" class="btn btn-secondary my-3">GO BACK</a>';
        }
    ?>
</div>
<?php require_once 'view-comp/footer.php' ?>