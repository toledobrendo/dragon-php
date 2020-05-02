<?php
require_once('view-bob/header.php');
 ?>
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
         <?php
         require_once('view-bob/footer.php');
          ?>
