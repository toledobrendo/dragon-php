<!DOCTYPE html>
<html>
<head>
	<title>Book Catalog</title>
</head>
<body>

	<?php require_once('view-comp/nav.php'); ?>
	<?php require_once('view-comp/head-links.php'); ?>

	<div class="container">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">Book Search</h3>

				<form action="search-results.php" method="post">
					<div class="form-group">
						<label for="searchType">Choose Search Type</label>
						<select class="form-control" id="searchType" name="searchType">
							<option value="author.name">Author</option>
							<option value="book.title">Title</option>
							<option value="book.isbn">ISBN</option>
						</select>
					 </div>

					<div class="form-group">
						<label for="searchType">Choose Search Type</label>
						<input class="form-control" type="text" id="searchTerm" name="searchTerm" placeholder="Search Term">
					</div>

					<div>
						<button class="btn btn-primary" type="submit">Search</button>
					</div>
				</form>
				
			</div>
		</div>
	</div>

	<?php require_once('view-comp/footer.php'); ?>
	<?php require_once('view-comp/dependencies.php') ?>

</body>
</html>