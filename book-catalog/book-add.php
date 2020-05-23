<?php require_once 'view-comp/header.php'; ?>
<div class="card-header">
    Add Book
</div>
<div class="card-body">
    <form action="process-book-add.php" method="POST">
        <div class="form-group">
            <label for="bookTitle">Book Title</label>
            <input type="text" name="bookTitle" id="bookTitle" class="form-control" placeholder="Book Title" />
        </div>
        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" name="isbn" id="isbn" class="form-control" placeholder="ISBN" max="14" />
        </div>
        <div class="form-group">
            <label for="authorId">Author ID</label>
            <input type="number" name="authorId" id="authorId" class="form-control" placeholder="Author ID" />
        </div>
        <div class="form-group">
            <label for="coverImage">Cover Image</label>
            <input type="file" name="coverImage" id="coverImage" class="form-control-file" />
        </div>
        <div>
            <button type="submit" class="btn btn-primary">SUBMIT</button>
        </div>
    </form>
</div>
<?php require_once 'view-comp/footer.php' ?>