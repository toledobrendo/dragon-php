<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand font-weight-bold h2" href="">Book Catalog</a>

	<div class="">
		<ul class="navbar-nav">
			<li class="nav-item nav-link">
				<a class="nav-link <?php if(strpos($_SERVER['REQUEST_URI'], 'index.php')) echo'active'; ?>" href="index.php">Book Search</a>
			</li>

			<li class="nav-item nav-link">
				<a class="nav-link <?php if(strpos($_SERVER['REQUEST_URI'], 'author-add.php')) echo'active'; ?>" href="author-add.php">Add Author</a>
			</li>

			<li class="nav-item nav-link">
				<a class="nav-link <?php if(strpos($_SERVER['REQUEST_URI'], 'book-add.php')) echo'active'; ?>" href="book-add.php">Add Book</a>
			</li>


		</ul>
	</div>
</nav>