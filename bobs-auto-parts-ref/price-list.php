<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous">
  </head>
  <body>
    <!-- hello-world.php or hello_world.php -->
    <div class="container">
      <div class="card">
        <div class="card-body">
          <h1>Price List</h1>
          <?php
            echo '</p>Products</p>';

            $products = array('Tires', 'Oil', 'Spark Plugs');
            $produces = array('Cabbage', 'Avocado', 'Blueberry');
            echo '</p>Product 0: '.$products[0];

            sort($products);
            // rsort($products);

            echo '<ul>';
            //to access every index of the array
            for ($ctr = 0; $ctr < count($products); $ctr++) 
            {
              echo '<li>'.$products[$ctr].'</li>';
            }
            echo '</ul>';

            echo '<ul>';
            $ctr = 0;
            //a special loop that iterates and every element in the iteration is named as '&$product'
            //'&' means pointers, it is used to modify values outside of the loop. pass by reference
            foreach ($products as &$product) 
            {
              $product = $product.' - 1pcs';
              echo '<li>'.$ctr.' - '.$product.'</li>';
              $ctr++;
            }
            echo '</ul>';

            echo '<ul>';
            for ($ctr = 0; $ctr < count($products); $ctr++)
            {
              echo '<li>'.$products[$ctr].'</li>';
            }
            echo '</ul>';

            $numbers = range(1, 10, 2);
            echo '<br/>range(1, 10): ';
            foreach ($numbers as $number) 
            {
              echo $number.', ';
            }
            echo '<br/>';

            $letters = range('a', 'z');
            echo '<br/>letters: ';
            foreach ($letters as $letter) 
            {
              echo $letter.' ';
            }
            echo '<br/>';

            $prices = array('Tires' => 100, 'Oil' => 20, 'Spark Plugs' => 5, 1000);

            $prices['Tires'] = 120;
            echo 'Tire price: '.$prices['Tires'];

            echo '<br/>Fourth price: '.$prices[0];

            $prices['Clutch Disk'] = 250;

            echo '<br/>Clutch Disk: '.$prices['Clutch Disk'];

            ksort($prices);
            krsort($prices);
            asort($prices);
            arsort($prices);

            echo '<ul>';
            foreach($prices as $itemDesc => $price) 
            {
              echo '<li>'.$itemDesc.' - '.$price.'</li>';
            }
            echo '</ul>';

            $empty = array();

            $items = array(
                        array('Code' => 'OIL', 'Description' => 'Oil', 'Price' => 10),
                        array('Code' => 'TIR', 'Description' => 'Tires', 'Price' => 100),
                        array('Code' => 'SPK', 'Description' => 'Spark Plugs', 'Price' => 5)
                      );

            echo '<p>'.$items[1]['Description'];

            function compareItems($fir, $sec) 
            {
              if ($fir['Price'] == $sec['Price']) 
              {
                return 0;
              } 
              else if ($fir['Price'] > $sec['Price']) 
              {
                return -1;
              } 
              else 
              {
                return 1;
              }
            }

            usort($items, 'compareItems');

            echo '<table class="table table-condensed">
                    <thead>
                    <tr>
                      <th>Code</th>
                      <th>Description</th>
                      <th>Price</th>
                    </tr>
                    </thead>';
            foreach ($items as $item) 
            {
              echo '<tr>';
              foreach ($item as $value) 
              {
                echo '<td>'.$value.'</td>';
              }

              echo '</tr>';
            }
            echo '</table>';
          ?>
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