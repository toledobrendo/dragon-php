<?php require_once 'view-comp/header.php'; ?>
<div class="card-header">
    <h3 class="card-title">Result:</h3>
</div>
<div class="card-body">
    <?php
        $bookTitle = $_POST['bookTitle'];
        $isbn = $_POST['isbn'];
        $authorId = $_POST['authorId'];
        $coverImage = 'resource/image/'.$_POST['coverImage'];

        try {
            if (!$bookTitle || !$isbn || !$authorId || !$coverImage) {
                throw new Exception('You have not entered an author name. Please go back and try again', 0);
            }

            @$db = new mysqli('192.168.2.73:3306', 'user', 'asd123', 'php_lesson_db');
            $dberror = mysqli_connect_errno();

            if ($dberror) {
                throw new Exception('Error: could not connect to database. Please try again later.' . ' ' . $dberror, 1);
            }

            $queryBook = 'INSERT INTO book (title, isbn, image, author_id) VALUES (?,?,?,?)';
            logMessage($queryBook);

            //prepare and bind query
            $stmtBook = $db->prepare($queryBook);
            $stmtBook->bind_param("sssi", $bookTitle, $isbn, $coverImage, $authorId);

            //execute query
            $stmtBook->execute();

            $affectedRows = $stmtBook->affected_rows;
            if($affectedRows>0){
                echo $affectedRows . " book inserted into database.";
            } else {
                throw new Exception('Error: the author was not added.');
            }

            //close query
            $stmtBook->close();

        } catch (Exception $e) {
            echo $e->getMessage();
            echo '<br/><a href="javascript:history.go(-1)" class="btn btn-secondary my-3">GO BACK</a>';
        }
    ?>
</div>
<?php require_once 'view-comp/footer.php' ?>