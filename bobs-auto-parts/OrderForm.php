<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
    crossorigin="anonymous">

</head>
<body>
  <div class="container">
    <div class="card">
      <div class="card-body">
        <h1 class="card-title">Order Form</h1>

        <?php
        $items = array(
            array('Description'=> 'OIL', 'Price' =>10, 'Input' => '<input type="number" name="tireQty" maxlength="3" min="0" max="10" class="form-control"/>'),
            array('Description'=> 'Tires', 'Price' =>100, 'Input' =>'<input type="number" name="oilQty" maxlength="3" min="0" max="10" class="form-control"/>'),
            array('Description'=> 'Spark Plugs', 'Price' => 1000, 'Input' =>'<input type="number" name="spQty" maxlength="3" min="0" max="10" class="form-control"/>')
          );

          function compareItems($fir,$sec){
            if($fir['Price'] == $sec['Price']){
              return 0;
            }else if ($fir['Price'] > $sec['Price']){
              return 1;
            }else{
              return -1;
            }
          }

          usort($items,'compareItems');


        echo '<form action="process-order.php" method="post">
              <table class="table table-condensed">
              <thead>
              <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Quantity</th>
              </tr>
              </thead>';
        foreach ($items as $item) {
          echo '<tr>';
          foreach ($item as $field => $value) {
            echo '<td>'.$value.'</td>';
          }
          echo '</tr>';
        }
        echo '<tr>
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
                <td colspan = "2">
                  <a href="freight-cost.php" class="btn btn-secondary float-left" >Freight Cost</a>
                </td>
                <td>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
                </td>
              </tr>
              </table>';
         ?>



      </div>
    </div>
  </div

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>
