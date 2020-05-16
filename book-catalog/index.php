<!DOCTYPE html>
<?php 
	require_once('view-comp/header.php');
 ?>

<form action="results.php" method="POST">
	<!-- Search Type -->
	<div class="form-group">
		<label for="searchType">Choose search type</label>
		<select class="form-control" id="searchType" name="searchType">
			<option value="author">Author</option>
			<option value="title">Title</option>
			<option value="isbn">ISBN</option>
		</select>
	</div>
	
	<!-- Search Term -->
	<div class="form-group">
		<label for="searchTerm">Search Term</label>
		<input type="text" id="searchTerm" name="searchTerm" class="form-control" placeholder="Search Term">
	</div>

	<!-- submit button -->
	<div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</div>
</form>
				
<?php 
	require_once('view-comp/footer.php');
 ?>