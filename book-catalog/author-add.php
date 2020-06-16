<?php require_once('view-comp/header.php');?>
<div class="card-header">
 Add author
</div>

<div class="card-body">
  <form action="process-author-add.php" method="post">

    <div class="form-group">

      <label for="authorName">Author name</label>
      <input id="authorName" name="authorName" class="form-control" type="text"/>

    </div>

      <div>
        <button class="btn btn-primary" type="submit">Submit</button>
      </div>
      
  </form>

 </div>
 <?php require_once('view-comp/footer.php') ?>