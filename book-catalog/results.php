<?php require_once 'view-comp/header.php'; ?>

<div class="card-header">
    <h3 class="card-title">Book Results:</h3>
</div>
<div class="card-body">
    <?php
    define('FIELDS', array('author' => 'author.name', 'title' => 'book.title', 'isbn' => 'book.isbn'));
    $searchType = $_POST['searchType'];
    $searchTerm = $_POST['searchTerm'];


    try {
        if (!$searchType || !$searchTerm) {
            throw new Exception('You have not entered search details. Please go back and try again', 0);
        }
        @$db = new mysqli('192.168.2.73:3306', 'user', 'asd123', 'php_lesson_db');
        $dberror = mysqli_connect_errno();

        if ($dberror) {
            throw new Exception('Error: could not connect to database. Please try again later.' . ' ' . $dberror, 1);
        }

        $query = 'SELECT image, author.name AS author_name, book.title, book.isbn
             FROM book
             INNER JOIN author
             ON book.author_id = author.id
             WHERE ' . FIELDS[$searchType] . ' LIKE \'%' . $searchTerm . '%\';';

        logMessage($query);

        $result = $db->query($query);

        $resultCount = $result->num_rows;

        echo "<p>Result for " . $searchType . " : " . $searchTerm;
        echo "<p>Number of books found: " . $resultCount;

        for ($ctr = 0; $ctr < $resultCount; $ctr++) {
            $row = $result->fetch_assoc();
    ?>
            <div class='card col-6'>
                <div class='card-body'>
                    <img class="img-fluid img-thumbnail float-left mx-2" src="<?php echo $row['image'] ?>" alt="cover-art" style="width: 50%; height: 50%" />
                    <h6><?php echo $row['title'] ?></h6>
                    <p>
                        By: <?php echo $row['author_name'] ?>
                        <br />
                        ISBN: <?php echo $row['isbn'] ?>
                    </p>
                </div>
            </div>
    <?php
        }
    } catch (Exception $e) {
        echo $e->getMessage();
        echo '<br/><a href="javascript:history.go(-1)" class="btn btn-secondary my-3">GO BACK</a>';
    }
    ?>
</div>
<?php require_once 'view-comp/footer.php' ?>