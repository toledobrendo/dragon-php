<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous">
  </head>
  <body>
    <div class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div href="index.php" class="navbar-brand">Book Catalog</div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
          <li class="nav-item <?php if(strpos($_SERVER['REQUEST_URI'], 'index.php')) echo 'active'; ?>">
            <a class="nav-link" href="index.php">Book Search</a>
          </li>
          <li class="nav-item <?php if(strpos($_SERVER['REQUEST_URI'], 'book-add.php')) echo 'active'; ?>">
            <a class="nav-link" href="book-add.php">Add Book</a>
          </li>
          <li class="nav-item <?php if(strpos($_SERVER['REQUEST_URI'], 'author-add.php')) echo 'active'; ?>">
            <a class="nav-link" href="author-add.php">Add Author</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="container">
      <div class="card">
