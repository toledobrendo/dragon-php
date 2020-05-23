<?php require_once('view-comp/header.php'); ?>
<div class="card-header">
  Add Book
</div>
<div class="card-body">
    <form action="process-book-add.php" method="post">
      <div class="form-group">
        <label for="bookTitle">Book Title</label>
        <input id="bookTitle" name="bookTitle" class="form-control" type="text" required="required">

        <label for="authorName">Author Name</label>
        <input id="authorName" name="authorName" class="form-control" type="text" required="required">

        <label for="isbn">ISBN</label>
        <input id="isbn" name="isbn" class="form-control" type="text" required="required">

        <label for="imgurl">Image URL</label>
        <input id="imgurl" name="imgurl" class="form-control" type="text" required="required">
      </div>
      
      <div>
        <button class="btn btn-primary" type="Submit">Submit</button>
      </div>
    </form>
</div>
<?php require_once('view-comp/footer.php'); ?>