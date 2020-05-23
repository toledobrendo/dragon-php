<?php require_once('view/header.php'); ?>
<div class="card-header">
  Add Book
</div>
<div class="card-body">
  <form action="process-author-add.php" method="post">
    <div class="form-group">
      <label for="bookTitle">Book Title</label>
      <input id="bookTitle" name="bookTitle" class="form-control" type="text"/>
      <label for="authorName">Author Name</label>
      <input id="authorName" name="authorName" class="form-control" type="text"/>
      <label for="bookISBN">ISBN</label>
      <input id="bookISBN" name="bookISBN" class="form-control" type="text"/>
      <label for="pic_url">Image URL</label>
      <input id="pic_url" name="pic_url" class="form-control" type="text"/>
    </div>
    <div>
      <button class="btn btn-primary" type="submit">Submit</button>
    </div>
  </form>
</div>
<?php require_once('view/footer.php'); ?>
