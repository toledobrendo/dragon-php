<!DOCTYPE html>
<?php
require_once 'view/header.php';
?>

<h3 class="card-header">Add Book</h3>
  <form action="add-book-process-index.php" method="post">
    <div class="form-group my-2">

      <label>Book Title </label>
      <input type="text" id="book-title" name="book-title"
      class="form-control" placeholder="Book Title"/>

      <label >Author</label>
        <input type="text" id="author-title" name="author-title"
         class="form-control" placeholder="Author"/>

      <label>ISBN</label>
        <input type="text" id="isbn" name="isbn"
        class="form-control" placeholder="ISBN"/>

      <label>Image Url</label>
        <input type="text" id="image-url" name="image-url"
        class="form-control" placeholder="Image URL"/>

  <div>
    <button type="submit" class="btn btn-primary" name="search-book">Submit</button>
  </div>
  </form>




<?php require_once 'view/footer.php';?>
