<html>

<head>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Add Book</title>
</head>

<body>

  <br><br>
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h5><center>Add Book</center></h5>
      </div>

      <div class="card-body">
        <form action="" method="POST">
          <div class="form-group">
            <label for="book-title">Book Title</label>
            <input class="form-control" type="text" name="book-title" id="book-title" placeholder="input book title" required>
          </div>

          <div class="form-group">
            <label for="book-author">Author Name</label>
            <input class="form-control" type="text" name="book-author" id="book-author" placeholder="input author" required>
          </div>

          <div class="form-group">
            <label for="isbn">ISBN</label>
            <input class="form-control" type="text" name="isbn" id="isbn" placeholder="input isbn code" required>
          </div>

          <div class="form-group">
            <label for="img-url">Image URL</label>
            <input class="form-control" type="text" name="img-url" id="img-url" placeholder="input image url" required>
          </div>

          <div>
            <button class="btn btn-primary" type="submit">Submit</button>
          </div>
        </form>

      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
