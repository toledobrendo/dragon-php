<?php
function activePage($currect_page)
{
    //Get URL and remove /
    $url_array =  explode('/', $_SERVER['REQUEST_URI']);
    $url = end($url_array);
    //Check if Current page matches of the items
    if ($currect_page == $url) {
        echo 'active'; //class name in css 
    }
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="book-search.php">Book Catalog</a>
    <div class="collapse navbar-collapse" id="topNavBar">
        <div class="navbar-nav">
            <a class="nav-item nav-link <?php activePage("book-search.php") ?>" href="book-search.php">Book Search</a>
            <a class="nav-item nav-link <?php activePage("author-add.php") ?>" href="#">Add Author</a>
            <a class="nav-item nav-link <?php activePage("book-add.php") ?>" href="book-add.php">Add Book</a>
        </div>
    </div>
</nav>