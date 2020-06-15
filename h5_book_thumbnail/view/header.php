<?php
  function isActive($page)
  {
    return strpos($_SERVER['REQUEST_URI'], $page);
  }
 ?>
<html>
<head>
  <title>Book Catalog</title>
</head>
<?php
  require_once 'view/bootstrap.php';
?>
<body>
  <div class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div href="index.php" class="navbar-brand"> Book Catalog </div>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav">
        <li class="nav-item <?php if(isActive('index.php')) echo 'active'; ?>">
          <a class = "nav-link" href="search-book-index.php"> Book Search </a>
        </li>
        <li class="nav-item <?php if(isActive('contact-us.php')) echo 'active'; ?>">
          <a class = "nav-link" href="add-author-index.php"> Add Author </a>
        </li>
      </ul>
    </div>
  </div>

  <div class="container">
    <div class="card my-3">
      <div class="card-body">
