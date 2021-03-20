<?php
	require_once('view-comp/header.php');
?>

<div class="card-header">
	Search Book
</div>

<div class="card-body">
	<form action="results.php" method="POST" autocomplete="off">
		<div class="form-group">
			<label for="searchType">Choose Search Type</label>
			<select class="form-control" id="searchType" name="searchType">
				<option value="author">Author</option>
				<option value="title">Title</option>
				<option value="isbn">ISBN</option>
			</select>
		</div>

		<div class="form-group">
			<label for="searchTerm">Search Term</label>
			<input type="text" id="searchTerm" name="searchTerm" class="form-control" placeholder="Search Term">
		</div>

		<div>
			<a href="../index.php" class="btn btn-danger float-right">Go Back</a>
			<button type="Submit" class="btn btn-primary">Submit</button>
		</div>
	</form>
</div>

<?php
	require_once('view-comp/footer.php');
?>