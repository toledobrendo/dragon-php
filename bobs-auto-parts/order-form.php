<?php 
  require_once('view-comp/bobs-header.php');
?>

				<h3 class="card-title">Order Form</h3>
				
				<?php
					 $items = array(
           						 array('Description'=> 'Oil', 'Price' => '<input type="number" name="tireQty" maxlength="3" min="0" max="10" class="form-control"/>'),
            					array('Description'=> 'Tires', 'Price' =>'<input type="number" name="oilQty" maxlength="3" min="0" max="10" class="form-control"/>'),
            					array('Description'=> 'Spark Plugs', 'Price' =>'<input type="number" name="sparkQty" maxlength="3" min="0" max="10" class="form-control"/>')
          					);

					function compareItems($fir,$sec){
            			if($fir['Price'] == $sec['Price']){
              				return 0;
            			} else if ($fir['Price'] > $sec['Price']){
             				return 1;
            			} else{
              				return -1;
            			}
         			}

         			usort($items,'compareItems');

         			echo 
         			'<form action="process-order.php" method="post">
              		<table class="table table-condensed">
              				<thead>
              					<tr>
                					<th colspan="2">Item</th>
                					<th colspan="2">Quantity</th>
              					</tr>
              				</thead>';

        			foreach ($items as $item) {
          				echo '<tr>';
          			foreach ($item as $field => $value) {
            			echo '<td colspan="2">'.$value.'</td>';
          			}

          			echo '</tr>';

        			}

        			echo 
        			'<tr>
              			<td colspan="2">How did you find Bobs</td>
              			<td>
                			<select name="find" class="custom-select">
                  				<option value="regular">Im a regular customer</option>
                  				<option value="tv">TV advertising</option>
                  				<option value="phone">Phone Directory</option>
                  				<option value="mouth">Word of mouth</option>
                			</select>
             			</td>
              		</tr>

              		<tr>
                		<td colspan="4">
                  		<a href="freight-cost.php" class="btn btn-secondary float-right" style="margin-left:50px;">Freight Cost</a>
                  		<button type="submit" class="btn btn-primary float-right">Submit</button>
               	 	</td>
              		</tr>
              		</table>';				
				?>

<?php 
  require_once('view-comp/bobs-footer.php');
?>
