<!DOCTYPE html>
<html>
<head>
	<title>Add Author</title>
</head>
<body>

	<?php require_once('view-comp/nav.php'); ?>
	<?php require_once('view-comp/head-links.php'); ?>

	<div class="container">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">Add an Author</h3>

				<form action="process-author-add.php" method="post">
					<div class="form-group">
						<label for="authorName">Full Name</label>
						<input class="form-control" type="text" id="authorName" name="authorName" placeholder="">
					</div>

					<div>
						<button class="btn btn-primary" type="submit">Add Author</button>
					</div>
				</form>

			</div>
		</div>
	</div>

	<?php require_once('view-comp/footer.php'); ?>
	<?php require_once('view-comp/dependencies.php') ?>

</body>
</html>