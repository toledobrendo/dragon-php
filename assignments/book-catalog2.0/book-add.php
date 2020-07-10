<?php require_once('view-comp/header.php'); ?>

<div class="card-header">
  Add Book
</div>
<div class="card-body">
    <form class="" action="process-book-add.php" method="post">
      <div class="form-group">
          <label for="bookTitle">Book Title</label>
          <input class="form-control" type="text" id ="bookTitle" name="bookTitle" required='required'/>
      </div>
      <div class="form-group">
          <label for="authorName">Author Name</label>
          <input class="form-control" type="text" id ="authorName" name="authorName" required='required'/>
      </div>
      <div class="form-group">
          <label for="isbn">ISBN</label>
          <input class="form-control" type="text" id ="isbn" name="isbn" required="required"/>
      </div>
      <div class="form-group">
          <label for="imageUrl">Image URL</label>
          <input class="form-control" type="text" id ="imageUrl" name="imageUrl" required='required'/>
      </div>
      <div>
        <button class="btn btn-success" type="submit">Submit</button>
      </div>
    </form>
</div>

<?php require_once('view-comp/footer.php'); ?>
