<?php
	require_once('view-comp/header.php');
?>

<div class="card-header">Search Book</div>

<div class="card-body">

	<form action="result.php" method="post">

		<div class="form-group">

			<label for="searchType">Choose Search Type</label>

			<select class="form form-control" id="searchType" name="searchType">
				<option value="author">Author</option>
				<option value="title">Title</option>
				<option value="isbn">ISBN</option>
			</select>

		</div>

		<div class="form-group">
			<label for="searchTerm">Search Term</label>
			<input type="text" name="searchTerm" id="searchTerm" class="form-control" placeholder="Search Term">		
		</div>

		<div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>

	</form>

</div>
			
<?php
	require_once('view-comp/footer.php');
?>