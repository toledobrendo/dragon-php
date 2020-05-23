<?php
    function isActive($page){
        return strpos($_SERVER['REQUEST_URI'], $page); 
    }
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
          crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
          integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
          crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
          integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
          crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
          integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
          crossorigin="anonymous"></script>
        
        <style>
            
            .book details{
                width: 100%;
                margin: auto; 
            }
            .img-thumbnail{
                float: left;
            }
            
            .book-text-details{
                display: inline-block;
            }
        </style>
    </head>
    
    
  <body>
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div href="index.php" class="navbar-brand">Book Catalog</div>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        
                        <li class="nav-item <?php if(isActive('index.php')) echo 'active'; ?>">
                        <a class="nav-link" href="index.php">Book Search</a>
                        </li>
                        
                        <li class="nav-item <?php if(isActive('author-add.php')) echo 'active'; ?>">
                        <a class="nav-link" href="author-add.php">Add Author</a>
                        </li>
                        
                        <li class="nav-item <?php if(isActive('book-add.php')) echo 'active'; ?>">
                        <a class="nav-link" href="book-add.php">Add Book</a>
                        </li>
                    
                    </ul>
                </div>
        </div>
      
        <div class="container">
            <div class="card my-3">
                
            