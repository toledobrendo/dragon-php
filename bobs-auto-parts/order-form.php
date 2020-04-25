<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous">
    <title>Order Form</title>
  </head>
  <body>
    <div class="container">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title">Order Form</h3>
          <form action="process-order.php" method="post">
            <table class="table">
              <thead>
                <tr class="row">
                  <td class="col-4">Item</td>
                  <td class="col-4">Price</td>
                  <td class="col-4">Quantity</td>
                </tr>
              </thead>
              <tbody>
                <?php
                  $products = array(
                    'tires' => array('desc' => 'Tires', 'price' => 150, 'quantity' => 0),
                    'oil' => array('desc' => 'Oil', 'price' => 10, 'quantity' => 0),
                    'sparkplugs' => array('desc' => 'Spark Plugs', 'price' => 5, 'quantity' => 0));

                  foreach ($products as $code => $data) {
                    echo '<tr class="row">';
                    echo '<td class="col-4">'.$data['desc'].'</td>';
                    echo '<td class="col-4">'.$data['price'].'</td>';
                    echo '<td class="col-4">';
                    echo '<input class="form-control" type="number" name="'.$code.'" min="0" value="'.$data['quantity'].'" required>';
                    echo "</td></tr>";
                  }
                ?>

                <tr class="row">
                  <td class="col-8">How did you find Bob's</td>
                  <td class="col-4">
                    <select name="find" class="custom-select">
                      <option value="regular">I'm a Regular Customer</option>
                      <option value="tv">TV Advertising</option>
                      <option value="phone">Phone Directory</option>
                      <option value="mouth">Word of Mouth</option>
                    </select>
                  </td>
                </tr>

                <tr class="row">
                  <td colspan="2" class="col-12">
                    <a href="freight-cost.php" class="btn btn-secondary float-left">Freight Cost</a>
                    <button type="submit" class="btn btn-primary submit float-right" name="button">Submit</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </form>
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
