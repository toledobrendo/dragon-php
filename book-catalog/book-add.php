<?php

	require_once('view-comp/header.php');
?>

<div class="card-header">Add Book</div>
<div class="card-body">

	<form action="process-book-add.php" method="post">

		<div class="form-group">

			<label for="bookTitle">Book Title</label>
			<input id="bookTitle" name="bookTitle" class="form-control" type="text" />



			<label for="authorName">Author Name</label>
			<input id="authorName" name="authorName" class="form-control" type="text" />



			<label for="isbn">ISBN</label>
			<input id="isbn" name="isbn" class="form-control" type="text" />



			<label for="imgSrc">Book Cover Image URL</label>
			<input id="imgSrc" name="imgSrc" class="form-control" type="text" />

		</div>

		<!-- SUBMIT BUTTON -->
		<div>
			<button class="btn btn-primary" type="submit">Submit</button>
		</div>


	</form>

</div>
			
<?php
	require_once('view-comp/footer.php');
?>