<?php
    require_once 'view-comp/header.php';
    require_once 'resource/db-properties.php';
?>
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

            @$db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
            $dberror = mysqli_connect_errno();

            if ($dberror) {
                throw new Exception('Error: could not connect to database. Please try again later.' . ' ' . $dberror, 1);
            }

            $queryDuplicate = 'SELECT name FROM author WHERE name = ?';
            $queryAuthor = 'INSERT INTO author (name) VALUES (?)';
            logMessage($queryAuthor);

            //prepare and bind query
            $stmtDuplicate = $db->prepare($queryDuplicate);
            $stmtAuthor = $db->prepare($queryAuthor);

            $stmtDuplicate->bind_param("s", $authorName);
            $stmtAuthor->bind_param("s", $authorName);

            //execute query
            $stmtDuplicate->execute();
            $duplicateResult = $stmtDuplicate->fetch();

            if($duplicateResult==$authorName){
                echo 'Author: '.$authorName. " is already in database.";
            } else {
                $stmtAuthor->execute();

                $affectedRows = $stmtAuthor->affected_rows;
                if ($affectedRows > 0) {
                    echo $affectedRows . " author inserted into database.";
                } else {
                    throw new Exception('Error: the author was not added.');
                }
            }
            $stmtDuplicate->close();

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