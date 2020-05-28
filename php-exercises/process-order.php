<!DOCTYPE html>
<?php
  define('TIRE_PRICE', 100);
  define('OIL_PRICE', 50);
  define('SPARK_PRICE', 30);
?>
<html>
<head>
	<title>Process Order</title>
</head>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<body>
  <div class="container">
    <div class="card">
			<div class="card-body">
				<div class="card-title">
          <h1> Bob's Auto Parts </h1>
          <?php
            echo "<div class = card-header>";
            echo '<p>Order Processed at ';
            echo date('H:i, jS F Y');
            echo '</p> </div>';

          ?>
        </div>

        <?php
        //Class
        class Product
        {
          
        }
        //Variables from order-form.php
          $tireQty = $_POST['tireQty'] ? $_POST['tireQty'] : 0;
          $oilQty = $_POST['oilQty'] ? $_POST['oilQty'] : 0;
          $sparkQty = $_POST['sparkQty'] ? $_POST['sparkQty'] : 0;
          $promo = $_POST['find'];
        //Computed Values
          $totalQty = @($tireQty + $oilQty + $sparkQty);
          $tireAmount = @($tireQty * TIRE_PRICE);
          $oilAmount = @($oilQty * OIL_PRICE);
          $sparkAmount = @($sparkQty * SPARK_PRICE);

        //Array


         ?>

        <div class="card-footer">
          <a class="btn btn-info" href="order-form.php">Go Back</a>
        </div>
			</div>
		</div>
  </div>

</body>

</html>

<!-- $items = array(
          array('Code' => 'OIL',
                'Description' => 'Oil',
                'Price' => 10),
          array('Code' => 'TIR',
                'Description' => 'Tire',
                'Price' => 100),
          array('Code' => 'SPK',
                'Description' => 'Spark Plug',
                'Price' => 5)
);

if($totalQty == 0)
{
  echo '<p class ="text-danger"> You did not order anything from the catalog, please try again </p>';
}
else
{
  echo '<p> Your Order Processed is as Follows: </p>';
  echo '<p> How did you find Bob '.$promo. '</p>'  ;
  echo '<p> Tires: ' .$tireQty. ' </p> <p> Price: ' .$tireAmount. '</p>' ;
  echo '<p> Oils: ' .$oilQty. ' </p> <p> Price: ' .$oilAmount. '</p>';
  echo '<p> Spark Plugs: ' .$sparkQty. ' </p> <p> Price: ' .$sparkAmount. '</p>';

  //to access multidimentional array
  foreach($items as $item)
  {
    echo '<tr>';
    foreach($item as $field => $value)
    {
      echo '<td>' .$value. '</td>';
    }
    echo '</tr>';
  }
} -->
