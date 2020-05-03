<html>

<head>
	<title> Hello World </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet"
		href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
		crossorigin="anonymous">
</head>
<body>

	<div class = "container">
		<div class = "card">
			<div class = "card-body">

				<!--start-->
				<h1>Price List</h1>
				<?php
					echo '</p>Products</p>';

          //array of strings, how to access it
          $products = array('Tires','Oil','Spark Plugs');

          echo '</p>Product 0: '.$products[0];

          //get list from index, use count() to know the index of the array
					echo '<ul>';
						for($ctr = 0; $ctr < count($products); $ctr++){
							echo '<li>'.$products[$ctr].'</li>';
						}
					echo '</ul>';

					//foreach loop
					echo '<ul>';
						$ctr = 0;
						foreach($products as &$product){
							$product = $product.' - 1';
							echo '<li>'.$ctr.' - '.$product.'</li>';
							$ctr++;
						}
					echo '</ul>';
					// need to add & to have pointer pass by reference to retain new value
					echo '<ul>';
						for($ctr = 0; $ctr < count($products); $ctr++){
							echo '<li>'.$products[$ctr].'</li>';
						}
					echo '</ul>';
				?>
				<!--end-->

			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
		integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
		integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
		crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
		integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
		crossorigin="anonymous"></script>
</body>

</html>
