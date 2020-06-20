<?php require_once './view-comp/header.php' ?>
        <div class="card-header">
          Add Book
        </div>
        <div class="card-body">
          <form action="process-book-add.php" method="post">
            <div class="form-group">
              <label for="title">Book Title</label>
              <input class="form-control" type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
              <label for="author">Author Name</label>
              <input class="form-control" type="text" id="author" name="author" required>
            </div>
            <div class="form-group">
              <label for="isbn">ISBN</label>
              <input class="form-control" type="text" id="isbn" name="isbn" required>
            </div>
            <div class="form-group">
              <label for="thumbnail">Image URL</label>
              <input class="form-control" type="text" id="thumbnail" name="thumbnail" required>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
<?php require_once './view-comp/footer.php'; ?>
