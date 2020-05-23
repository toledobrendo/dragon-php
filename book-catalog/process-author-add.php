<?php
    require_once('view/header.php');
?>

<div class="card-header">
    <h3>Add Author Result</h3>
</div>

<div class="card-body">
    <?php
        $authorName = $_POST['authorName']; 
        try{
            if(!$authorName){
                 
                throw new Exception('Author details not complete.'); 
            }
            
            @ $db = new mysqli('127.0.0.1:3306', 'nhoriza', 'asdf', 'php_lesson_db');
            
            // errno = error number 
            $dbError = mysqli_connect_errno();
                if ($dbError) {
                    throw new Exception('Error: Could not connect to database. '.
                    'Please try again later. ');
                }
            
            //query by string concatination
//            $query = 'INSERT INTO author(name) 
//                        VALUES (\''.$authorName.'\')'; 
//            $result =$db->query($query); 
//            
//            if($result){
//                echo $db->affected_rows." Author inserted into the database."; 
//            }
//            
//            else{
//                throw new Exception("Error: The author was not added"); 
//            }
            
            $authorName = $db->real_escape_string($authorName); 
            
            
            //query by prepared statement
            $query = 'INSERT INTO author(name) 
                        VALUES (?)';
            $stmt = $db->prepare($query); 
            $stmt -> bind_param("s", $authorName); 
            $stmt -> execute();
            
            $affectedRows = $stmt->affected_rows; 
                
            if($affectedRows > 0){
                echo $affectedRows." Author inserted into the database. "; 
            }
            
            else{
                throw new Exception("Error: The author was not added"); 
            }
            $stmt -> close();
        }
            
                
        catch(Exception $e){
            echo $e->getMessage(); 
        }
    ?>
</div>

<div class="card-footer">
    <a class="btn btn-secondary" href="author-add.php">Back</a>
</div>
     
<?php
    require_once('view/footer.php')
?>