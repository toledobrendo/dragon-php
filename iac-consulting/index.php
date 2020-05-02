<?php
	require_once('view-comp/header.php');
?>

	<div class="container">
		<div class ="card">
			<div class="card-body">
				<?php 
					echo @ $message;
				?>
			</div>
		</div>
	</div>

<?php
	require_once('view-comp/footer.php');
?>