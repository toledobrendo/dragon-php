<?php require_once('view-comp/header.php'); ?>
<div class="card-header">
  Add Book
</div>
<div class="card-body">
  <form action="process-book-add.php" method="POST">
    <div class="form-group">
      <label for="bookTitle">Book Title</label>
      <input id = "bookTitle" name="bookTitle" class="form-control" type="text" required>
      <label for="authorName">Author Name</label>
      <input id = "authorName" name="authorName" class="form-control" type="text" required>
      <label for="isbn">ISBN</label>
      <input id = "isbn" name="isbn" class="form-control" type="text" required>
      <label for="img-url">Image URL</label>
      <input id = "img-url" name="img-url" class="form-control" type="text" required>
    </div>
    <div class="form-group">
      <button class="btn btn-primary" type="submit">Submit</button>
    </div>
  </form>
</div>
<?php require_once('view-comp/footer.php'); ?>
