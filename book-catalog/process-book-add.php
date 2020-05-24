<?php require_once 'view-comp/header.php'; ?>
<div class="card-header">
    <h3 class="card-title">Add Book Result:</h3>
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

            //start of author block
            //check for author duplicates
            $queryAuthorDuplicate = 'SELECT name AS author_name FROM author WHERE name = ?';
            $stmtAuthorDuplicate = $db->prepare($queryAuthorDuplicate);
            $stmtAuthorDuplicate->bind_param("s", $authorName);
            $stmtAuthorDuplicate->execute();
            $authorDuplicateResult = $stmtAuthorDuplicate->fetch();
            logMessage($authorDuplicateResult);

            if ($authorDuplicateResult == $authorName) {
                echo 'Author: ' . $authorName . " found. Inserting Book.";
            } else {
                $queryAuthor = 'INSERT INTO author (name) VALUES (?)';
                logMessage($queryAuthor);

                $stmtAuthor = $db->prepare($queryAuthor);
                $stmtAuthor->bind_param("s", $authorName);

                $stmtAuthor->execute();

                $authorAffectedRows = $stmtAuthor->affected_rows;

                if($authorAffectedRows>0){
                    echo $authorAffectedRows." author inserted into database.";
                } else {
                    throw new Exception('Error: the author was not added.');
                }
                $stmtAuthor->close();
            }
            $stmtAuthorDuplicate->close();
            //end of author block

            //start of book block
            $queryBookDuplicate = 'SELECT title FROM book WHERE title = ?';
            logMessage($queryBookDuplicate);

            $stmtBookDuplicate = $db->prepare($queryBookDuplicate);
            $stmtBookDuplicate->bind_param("s", $bookTitle);
            $stmtBookDuplicate->execute();
            $bookDuplicateResult = $stmtBookDuplicate->fetch();

            if ($bookDuplicateResult == $bookTitle) {
                echo 'Book: ' . $bookTitle . " is already in database.";
            } else {
                $queryBook = 'INSERT INTO book (title, isbn, author_name, image) VALUES (?,?,?,?)';
                logMessage($queryBook);

                $stmtBook = $db->prepare($queryBook);
                $stmtBook->bind_param("ssss", $bookTitle, $isbn, $authorName, $coverImage);
                $stmtBook->execute();

                $bookAffectedRows = $stmtBook->affected_rows;
                if($bookAffectedRows>0){
                    echo $bookAffectedRows." book inserted into database.";
                } else {
                    throw new Exception('Error: the book was not added.');
                }
                $stmtBook->close();
            }
            $stmtBookDuplicate->close();
            //end of book block

            mysqli_close($db);
        } catch (Exception $e) {
            echo $e->getMessage();
            error_log($e->getMessage());
            echo '<br/><a href="javascript:history.go(-1)" class="btn btn-secondary my-3">GO BACK</a>';
        }
    ?>
</div>
<?php require_once 'view-comp/footer.php' ?>