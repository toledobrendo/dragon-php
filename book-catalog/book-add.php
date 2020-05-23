<?php
	require_once('view-comp/header.php');
?>

<div class="card-header">Add Book</div>

<div class="card-body">

	<form action="process-book-add.php" method="POST">

		<div class="form-group">
			<label for="bookTitle">Book Title</label>
			<input id="bookTitle" name="bookTitle" type="text" class="form-control" required/>
		</div>

		<div class="form-group">
			<label for="authorName">Author Name</label>
			<input id="authorName" name="authorName" type="text" class="form-control" required/>
		</div>

		<div class="form-group">
			<label for="isbn">ISBN</label>
			<input id="isbn" name="isbn" type="text" class="form-control" required/>
		</div>

		<div class="form-group">
			<label for="imageURL">Image URL</label>
			<input id="imageURL" name="imageURL" type="text" class="form-control" required/>
		</div>

		<div>
			<button class="btn btn-primary" type="submit">Submit</button>
		</div>

	</form>

</div>
			
<?php
	require_once('view-comp/footer.php');
?>
