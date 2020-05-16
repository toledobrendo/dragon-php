<!DOCTYPE html>

<?php 
	require_once('view-comp/header.php');
	require_once('service/order-service.php');
?>

<h1>Order List</h1>

<?php 
	getOrder();
?>	

<a href="../index.php" class="btn btn-danger">Back to index</a>

<?php 
	require_once('view-comp/footer.php');
?>