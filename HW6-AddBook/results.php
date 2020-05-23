<?php 
    require_once('view/header.php');
?>

<div class="card-header">
    Book Results
</div>

<div class="card-body">
    <?php
        define('FIELDS', array(
            'author' => 'author.name',
            'title' => 'books.title',
            'isbn' => 'books.isbn'
        ));

        $searchType = $_POST['searchType'];
        $searchTerm = $_POST['searchTerm'];

        try {
            if (!$searchType || !$searchTerm) {
                throw new Exception('You have not entered search details. Please go back and try again.', 1);
            }

            // 127.0.0.1 = localhost
            // 3306 = port
            @ $db = new mysqli('127.0.0.1:3306', 'nhoriza', 'asdf', 'php_lesson_db');
            
            // errno = error number 
            $dbError = mysqli_connect_errno();
                if ($dbError) {
                    throw new Exception('Error: Could not connect to database. '.
                    'Please try again later. '.$dbError, 1);
                }
            
            $query = 'SELECT author.name as author_name, books.title, books.isbn, books.pic_resource
                FROM books
                INNER JOIN author
                ON author.id = books.author_id
                WHERE '.FIELDS[$searchType].' LIKE \'%'.$searchTerm.'%\';';
            
            //to check if tama yung generated query
            //echo $query.'<br/>'; 
            
            //kung ano result nung query
            $result = $db->query($query);
            
            //determine how many rows/set of data na nakuha
            $resultCount = $result->num_rows;

            echo '<p>Result for '.$searchType.' : '.$searchTerm.'</br>';
            echo 'Number of books found: '.$resultCount;
            
            
            echo '<div class="row">';
                for ($ctr = 0; $ctr < $resultCount; $ctr++) {
                    //fetch_assoc() : line by line yung pag fetch, retrieve data one at a time
                    $row = $result -> fetch_assoc();
    ?>
                    <div class="card">
                        <div class="card-body book-details">
                            <div class="img-thumbnail mx-3">
                                <img src="<?php echo $row['pic_resource'];?>" width="100px" height="150px"/>
                            </div>
                            
                            <div class="book-text-details">
                                <h6><?php echo $row['title'];?></h6>
                                <p> By: <?php echo  $row['author_name'];?><br/>
                                <?php echo $row['isbn']?></p>
                            </div>
                        </div>
                    </div>
    
    <?php
                }
                    echo '</div>';
                } 

        catch (Exception $e) {
                echo $e->getMessage();
            }
    ?>
        
        <br/>
        <a class="btn btn-secondary" href="index.php">Go Back</a>
</div>

<?php require_once('view/footer.php');?>