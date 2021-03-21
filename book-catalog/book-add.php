<?php
	require_once('view-comp/header.php');
?>

<div class="card-header">
	Add Book
</div>

<div class="card-body">
	<form action="process-book-add.php" method="POST" autocomplete="off">
		<div class="form-group">
			<label for="bookTitle">Book Title</label>
			<input type="text" class="form-control" id="bookTitle" name="bookTitle">

			<label for="authorName" class="my-2">Author Name</label>
			<input type="text" class="form-control" id="authorName" name="authorName">

			<label for="isbn" class="my-2">ISBN</label>
			<input type="text" class="form-control" id="isbn" name="isbn">

			<label for="isbn" class="my-2">Image URL</label>
			<input type="text" class="form-control" id="imgURL" name="imgURL">
		</div>
		<div>
			<a href="../index.php" class="btn btn-danger float-right">Go Back</a>
			<button class="btn btn-primary" type="submit">Submit</button>
		</div>
	</form>
</div>

<?php
	require_once('view-comp/footer.php');
?>