<?php
    require_once('view/header.php');
?>

<div class="card-header">
    <h3>Add Book</h3>
</div>

<div class="card-body">
    <form action="process-book-add.php" method="post">
        <div class="form-group">
            <label for="bookTitle">Book Title</label>
            <input id="bookTitle" name="bookTitle" class="form-control" type="text" required>
            <br>
            
            <label for="bookAuthor">Author Name</label>
            <input id="bookAuthor" name="bookAuthor" class="form-control" type="text" required>
            <br>
            
            <label for="bookISBN">ISBN</label>
            <input id="bookISBN" name="bookISBN" class="form-control" type="text" required>
            <br>
            
            <label for="bookImg">Image URL</label>
            <input id="bookImg" name="bookImg" class="form-control" type="text" required>
            <br>
        </div>
        
        <div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
    
</div>
     
<?php
    require_once('view/footer.php')
?>