<?php
	require_once('view-comp/header.php');
?>

<div class="card-header">Add Book</div>

<div class="card-body">

	<form action="process-BookAdd.php" method="POST">

    <div class="form-group">
      <label for="authorName">Enter Author Name</label>
      <input id="authorName" name="authorname" type="text" class="form-control" required/>
    </div>
		<div class="form-group">
			<label for="bookTitle">Enter Book Title</label>
			<input id="bookTitle" name="booktitle" type="text" class="form-control" required/>
		</div>
		<div class="form-group">
			<label for="isbn">Enter ISBN</label>
			<input id="isbn" name="isbn" type="text" class="form-control" required/>
		</div>
		<div class="form-group">
			<label for="imageURL">Enter Image URL</label>
			<input id="imageURL" name="url" type="text" class="form-control" required/>
		</div>

		<div>
			<button class="btn btn-success" type="submit">Submit</button>
		</div>

	</form>

</div>

<?php
	require_once('view-comp/footer.php');
?>
