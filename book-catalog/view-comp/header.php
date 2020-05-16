<!doctype html>
<?php
  function isActive($page){
    return strpos($_SERVER['REQUEST_URI'], $page);
  }
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Book Catalog</title>
  </head>
  <body>
    <!-- header -->
    <div class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div href="index.php" class="navbar-brand">Book Catalog</div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
          <li class="nav-item <?php if(isActive('index.php'))echo 'active';?>">
            <a class="nav-link" href=" index.php">Book Search</a>
          </li>
          <li class="nav-item <?php if(isActive('index.php'))echo 'active';?>">
            <a class="nav-link" href=" index.php">Add Author</a>
          </li>
        </ul>
      </div>
    </div>

  	<div class="container">
  		<div class="card my-3">
  			

