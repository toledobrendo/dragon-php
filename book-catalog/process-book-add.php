<?php require_once 'view-comp/header.php'; ?>
<div class="card-header">
    <h3 class="card-title">Result:</h3>
</div>
<div class="card-body">
    <?php
        $bookTitle = $_POST['bookTitle'];
        $isbn = $_POST['isbn'];
        $authorName = $_POST['authorName'];
        $coverImage = 'resource/image/'.$_POST['coverImage'];

        try {
            if (!$bookTitle || !$isbn || !$authorName || !$coverImage) {
                throw new Exception('You have not entered an author name. Please go back and try again', 0);
            }

            @$db = new mysqli('192.168.2.73:3306', 'user', 'asd123', 'php_lesson_db');
            $dberror = mysqli_connect_errno();

            if ($dberror) {
                throw new Exception('Error: could not connect to database. Please try again later.' . ' ' . $dberror, 1);
            }

            $queryAuthor = 'INSERT INTO author (name) VALUES (?)';
            $stmtAuthor = $db->prepare($queryAuthor);
            $stmtAuthor->bind_param("s", $authorName);
            $stmtAuthor->execute();

            $authorAffectedRows = $stmtAuthor->affected_rows;
            if($authorAffectedRows>0){
                echo $authorAffectedRows." author inserted into database.";
            } else {
                throw new Exception('Error: the author was not added.');
            }

            $queryBookAuthor = 'SELECT name as author_name FROM author WHERE name = "'.$authorName.'"';

            $authorResult = $db->query($queryBookAuthor);
            $stmtAuthorName = $authorResult->fetch_assoc();

            $queryBook = 'INSERT INTO book (title, isbn, author_name, image) VALUES (?,?,?,?)';

            logMessage($queryAuthor);
            logMessage($queryBookAuthor);
            logMessage($queryBook);

            $stmtBook = $db->prepare($queryBook);
            $stmtBook->bind_param("ssss", $bookTitle, $isbn, $stmtAuthorName['author_name'], $coverImage);

            $stmtBook->execute();


            $bookAffectedRows = $stmtBook->affected_rows;
            if($bookAffectedRows>0){
                echo $bookAffectedRows." book inserted into database.";
            } else {
                throw new Exception('Error: the book was not added.');
            }

            $stmtAuthor->close();
            $stmtBook->close();

            mysqli_close($db);
        } catch (Exception $e) {
            echo $e->getMessage();
            echo '<br/><a href="javascript:history.go(-1)" class="btn btn-secondary my-3">GO BACK</a>';
        }
    ?>
</div>
<?php require_once 'view-comp/footer.php' ?>