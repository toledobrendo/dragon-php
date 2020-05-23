<?php 
	require_once('view-comp/header.php');
 ?>

<div class="card-header">Add Book</div>
<div class="card-body">
	<form action="process-book-add.php" method="POST">
		<div class="form-group">
			<label for="bookTitle">Book Title</label>
			<input type="text" name="bookTitle" id="bookTitle" class="form-control">
		</div>
		<div class="form-group">
			<label for="authorName">Author Name</label>
			<input type="text" name="authorName" id="authorName" class="form-control">
		</div>
		<div class="form-group">
			<label for="bookISBN">ISBN</label>
			<input type="text" name="bookISBN" id="bookISBN" class="form-control">
		</div>
		<div class="form-group">
			<label for="bookImage">Image URL</label>
			<input type="text" name="bookImage" id="bookImage" class="form-control">
		</div>
		<div>
			<button class="btn btn-primary" type="submit">Submit</button>
		</div>
	</form>
</div>
				
<?php 
	require_once('view-comp/footer.php');
 ?>