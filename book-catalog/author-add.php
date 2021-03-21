<?php
	require_once('view-comp/header.php');
?>

<div class="card-header">
	Add Author
</div>

<div class="card-body">
	<form action="process-author-add.php" method="POST" autocomplete="off">
		<div class="form-group">
			<label for="authorName">Author Name</label>
			<input type="text" class="form-control" id="authorName" name="authorName">
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