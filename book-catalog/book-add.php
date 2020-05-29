<?php 
	require_once('view-comp/header.php'); 
?>

<div class="card-header">Add Book</div>

<div class="card-body">
  <form action="process-book-add.php" method="post">

    <div class="form-group">
      <label for="bookTitle">Book Title</label>
      <input id="bookTitle" type="text" name="bookTitle" class="form-control" required="">
    </div>

    <div class="form-group">
      <label for="authorName">Author Name</label>
      <input id="authorName" type="text" name="authorName" class="form-control" required="">
    </div>

    <div class="form-group">
      <label for="isbn">ISBN</label>
      <input id="isbn" type="text" name="isbn" class="form-control" required="">
    </div>

    <div class="form-group">
      <label for="imageURL">Image URL</label>
      <input id="imageURL" type="text" name="imageURL" class="form-control" required="">
    </div>

    <div>
      <button class="btn btn-primary" type="submit">Submit</button>
    </div>

  </form>
</div>

<?php 
	require_once('view-comp/footer.php'); 
?>