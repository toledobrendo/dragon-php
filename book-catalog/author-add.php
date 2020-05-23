<?php require_once('view-comp/header.php'); ?>
<div class="card-header">
  Add Author
</div>
<div class="card-body">
  <form action="process-author-add.php" method="POST">
    <div class="form-group">
      <label for="authorName">Author Name</label>
      <input id = "authorName" name="authorName" class="form-control" type="text">
    </div>
    <div class="form-group">
      <button class="btn btn-primary" type="submit">Submit</button>
    </div>
  </form>
</div>
<?php require_once('view-comp/footer.php'); ?>
