<?php 
	require_once 'view-comp/header.php';
?>
<div class="card-header">Add Book</div>
<div class="card-body">
	<form action="add-book-proccess.php" method="post">
		<div class="form-group">
			<label for="bookTitle">Book Title</label>
			<input type="text" name="bookTitle" id="bookTitle" class="form-control">
		</div>
		<div class="form-group">
			<label for="authorName">Author Name</label>
			<input type="text" name="authorName" id="authorName" class="form-control">
		</div>
		<div class="form-group">
			<label for="isbn">ISBN</label>
			<input type="text" name="isbn" id="isbn" class="form-control">
		</div>
		<div class="form-group">
			<label for="bookImage">Image URL</label>
			<input type="text" name="bookImage" id="bookImage" class="form-control">
		</div>
		<div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</form>
</div>
<?php 
	require_once 'view-comp/footer.php';
?>