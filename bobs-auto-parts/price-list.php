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
        <h1>Price List</h1>
        <?php
          echo '</p>Products:</p>';

          $products = array('Tires','Oil','Sparkplugs');

          echo '</p>Product 0: '.$products[0];

          sort($products);
          echo '<ul>';
          for ($ctr=0; $ctr < count($products); $ctr++) {
            echo '<li>'.$products[$ctr].'</li>';
          }
          echo '</ul>';

          echo '<ul>';
          foreach ($products as $products) {
            $products = $products. '-1';
            echo '<li>'.$products.'</li>';
          }
          echo '</ul>';

          $number= range(1,10);
          echo '<br/>range(1.10): ';
          foreach ($number as $number) {
            echo $number.' ';
          }
          echo "<br/>";

          $letters= range('a','z');
          echo '<br/>letters: ';
          foreach ($letters as $letters) {
            echo $letters.' ';
          }
          echo "<br/>";

          $prices = array('Tires' => 100,'Oil' => 20,'Sparkplug' => 5,1000);

          $prices['Tires'] = 120  ;
          echo 'Tire Price : '.$prices['Tires'];

          echo '<br/>Fourth Price : '.$prices[0];

          $prices['Clutch Disk'] = 20;
          echo '<br/>Clutch Disk: '.$prices['Clutch Disk'];
          echo '<ul>';
          foreach ($prices as $itemDesc => $price) {
                echo '<li>'.$itemDesc.'-'.$price.'</li>';
          }
            echo '</ul>';

            $empty = array();

            $items = array(
                array('Code' => 'OIL','Description'=> 'OIL', 'Price' =>10),
                array('Code' => 'Tire','Description'=> 'Tires', 'Price' =>100),
                array('Code' => 'Sparkplug','Description'=> 'Spark Plugs', 'Price' =>1000)
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
            echo '<p>'.$items[1]['Description'];
            echo '<table class="table table-condensed">
                  <thead>
                  <tr>
                    <th>Code</th>
                    <th>Description</th>
                    <th>Price</th>
                  </tr>
                  </thead>';
            foreach ($items as $item) {
              echo '<tr>';
              foreach ($item as $field => $value) {
                echo '<td>'.$value.'</td>';
              }
              echo '</tr>';
            }
            echo '</table>';


         ?>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>
