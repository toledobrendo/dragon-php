<?php
 require_once 'view/header.php';
// include '../view-comp/header.php';
 ?>
<h3 class="card-header"> Search Book </h3>
  <form action="search-book-process-index.php" method="post">
    <div class="form-group my-2">
      <label for ="search-type">Choose a Search Type </label>
      <select class="form-control" id="search-type" name="search-type">
        <option value="author">Author</option>
        <option value="title">Title</option>
        <option value="isbn">ISBN</option>
    </select>
    </div>
    <div class="form-group">
      <label for="search-term">Search Term</label>
        <input type="text" id="search-term" name="search-term" class="form-control" placeholder="Search Term"/>
    </div>

  <div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
  </form>


 <?php
   require_once 'view/footer.php';
 ?>
