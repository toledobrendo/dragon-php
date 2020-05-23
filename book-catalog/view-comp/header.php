<?php
    require_once 'service/tracker-service.php';
    require_once 'service/log-service.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Book Catalog</title>
</head>

<body>
    <div class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div href="../../index.php" class="navbar-brand">Book Catalog</div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item <?php if (isActive('index.php')) echo 'active'; ?>">
                    <a href="index.php" class="nav-link">Book Search</a>
                </li>
                <li class="nav-item <?php if (isActive('author-add.php')) echo 'active'; ?>">
                    <a href="author-add.php" class="nav-link">Add Author</a>
                </li>
                <li class="nav-item <?php if (isActive('book-add.php')) echo 'active'; ?>">
                    <a href="book-add.php" class="nav-link">Book Search</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="card my-3">