<?php
    require_once('view/header.php');
?>

<div class="card-header">
    <h3>Add Author Result</h3>
</div>

<div class="card-body">
    <?php
        $bookTitle = $_POST['bookTitle']; 
        $bookAuthor = $_POST['bookAuthor']; 
        $bookISBN = $_POST['bookISBN']; 
        $bookImg = $_POST['bookImg']; 
    
        try{
            if(!$bookTitle || !$bookAuthor || !$bookISBN || !$bookImg){
                throw new Exception('Book details not complete.'); 
            }
            
            @ $db = new mysqli('127.0.0.1:3306', 'nhoriza', 'asdf', 'php_lesson_db');
            
            // errno = error number 
            $dbError = mysqli_connect_errno();
                if ($dbError) {
                    throw new Exception('Error: Could not connect to database. '.
                    'Please try again later. ');
                }
            
            //query for selecting author id
            $selectAuthorIDQuery = 'SELECT id FROM author WHERE name = ?'; 
            $stmtAuthorID = $db->prepare($selectAuthorIDQuery);
            $stmtAuthorID->bind_param("s", $bookAuthor);
            $stmtAuthorID->execute();
            $resultAuthorID = $stmtAuthorID->get_result();
            
                //program if the author is not yet registered to the author table in db
                if($resultAuthorID->num_rows === 0){
                    $query = 'INSERT INTO author(name) VALUES (?)';

                    $stmt = $db->prepare($query); 
                    $stmt -> bind_param("s", $bookAuthor); 
                    $stmt -> execute();

                    $affectedRows = $stmt->affected_rows; 

                    if($affectedRows > 0){
                        echo $affectedRows." Author inserted into the database. "; 
                    }

                    else{
                        throw new Exception("Error: The author was not added"); 
                    }
                    
                    
                    
                    //to select the newly made author id
                    $stmtAuthorID = $db->prepare($selectAuthorIDQuery);
                    $stmtAuthorID->bind_param("s", $bookAuthor);
                    $stmtAuthorID->execute();
                    $resultAuthorID = $stmtAuthorID->get_result();
                    
                    $stmt -> close();
                } 
            
            while($row = $resultAuthorID->fetch_assoc()) {
                $authorID = $row['id'];
            }
    
            
            $insertBookDetailsQuery = 'INSERT INTO books (title, isbn, author_id, pic_resource) VALUES (?, ?, ?, ?)'; 
            $stmtBookDetails = $db->prepare($insertBookDetailsQuery);
            $stmtBookDetails->bind_param("ssis", $bookTitle, $bookISBN, $authorID, $bookImg);
            $stmtBookDetails->execute();
            
            $affectedRows = $stmtBookDetails->affected_rows; 
                
            if($affectedRows > 0){
                echo $affectedRows." book inserted into the database. "; 
            }
            
            else{
                throw new Exception("Error: The book was not added"); 
            }
            
            
            $stmtAuthorID->close();
            $stmtBookDetails -> close();
        }
            
                
        catch(Exception $e){
            echo $e->getMessage(); 
        }
    ?>
</div>

<div class="card-footer">
    <a class="btn btn-secondary" href="book-add.php">Back</a>
</div>
     
<?php
    require_once('view/footer.php')
?>