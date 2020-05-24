<?php require_once 'view-comp/header.php'; ?>
<div class="card-header">
    Add Book
</div>
<div class="card-body">
    <form action="process-book-add.php" method="POST">
        <div class="form-group">
            <label for="bookTitle">Book Title</label>
            <input type="text" name="bookTitle" id="bookTitle" class="form-control" placeholder="Book Title" required />
        </div>
        <div class="form-group">
            <label for="authorName">Author Name</label>
            <input type="text" name="authorName" id="authorName" class="form-control" placeholder="Author Name" required />
        </div>
        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" name="isbn" id="isbn" class="form-control" placeholder="ISBN" max="14" required />
        </div>
        <div class="form-group">
            <label for="coverImage">Image URL</label>
            <input type="file" name="coverImage" id="coverImage" class="form-control-file" required />
        </div>
        <div>
            <button type="submit" class="btn btn-primary">SUBMIT</button>
        </div>
    </form>
</div>
<?php require_once 'view-comp/footer.php' ?>