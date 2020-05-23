<?php require_once('view/header.php'); ?>
<div class="card-header">
  Add Author
</div>
<div class="card-body">
  <form action="process-author-add.php" method="post">
    <div class="form-group">
      <label for="authorName">Author Name</label>
      <input id="authorName" name="authorName" class="form-control" type="text"/>
    </div>
    <div>
      <button class="btn btn-primary" type="submit">Submit</button>
    </div>
  </form>
</div>
<?php require_once('view/footer.php'); ?>
