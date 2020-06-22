<!DOCTYPE html>
<html>
<head>
	<title>Add Book</title>
</head>
<body>

	<?php require_once('view-comp/nav.php'); ?>
	<?php require_once('view-comp/head-links.php'); ?>

	<div class="container">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">Add a Book</h3>

				<form action="process-book-add.php" method="post">
					<div class="form-group">
						<label for="bookName">Book Name</label>
						<input class="form-control" type="text" id="bookName" name="bookName" placeholder="" required>
					</div>

					<div class="form-group">
						<label for="authorName">Full Name</label>
						<input class="form-control" type="text" id="authorName" name="authorName" placeholder="" required>
					</div>

					<div class="form-group">
						<label for="isbn">ISBN</label>
						<input class="form-control" type="text" id="isbn" name="isbn" placeholder="" required>
					</div>

					<div class="form-group">
						<label for="imgUrl">Image URL</label>
						<input class="form-control" type="text" id="imgUrl" name="imgUrl" placeholder="" required>
					</div>

					<div>
						<button class="btn btn-primary" type="submit">Add Book</button>
					</div>
				</form>

			</div>
		</div>
	</div>

	<?php require_once('view-comp/footer.php'); ?>
	<?php require_once('view-comp/dependencies.php') ?>

</body>
</html>