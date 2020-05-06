<?php
require_once('view-bob/header.php');
require_once('controller/productObjects.php');
 ?>
        <h1>Price List</h1>
        <?php
          echo '</p>Products:</p>';

          foreach($items as $item) {
      			echo '<li>'.$item->__get('item').'</li>';
      		}

          $number= range(1,10);
          echo '<br/>range(1.10): ';
          foreach ($number as $number) {
            echo $number.' ';
          }
          echo "<br/>";

          echo 'Tire Price : '.$items[0]->__get('price').'</br>';
          echo 'Oil Price : '.$items[1]->__get('price').'</br>';
          echo 'Sparkplug Price : '.$items[2]->__get('price').'</br>';


              function compareItems($fir,$sec){
                if($fir->__get('price') == $sec->__get('price')){
                  return 0;
                }else if ($fir->__get('price') > $sec->__get('price')){
                  return 1;
                }else{
                  return -1;
                }
              }
              usort($items,'compareItems');

            echo "</br>";

            echo '<table class="table table-condensed">
                  <thead>
                  <tr class ="row">
                    <th class="col-2">Code</th>
                    <th class="col-2">Description</th>
                    <th class="col-2">Price</th>
                  </tr>
                  </thead>';
                  foreach($items as $item) {

      						echo '<tr class="row">';
      						echo '<td class="col-2">'.$item->__get('code').'</td>';
      						echo '<td class="col-2">'.$item->__get('item').'</td>';
      						echo '<td class="col-2">'.$item->__get('price').'</td>';

      						echo '</tr>';

      					}
            echo '</table>';


         ?>
         <?php
         require_once('view-bob/footer.php');
          ?>
