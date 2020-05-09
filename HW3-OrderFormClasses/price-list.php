<?php
    require_once('view/header.php')
?>

    <h1>Price List</h1>
    <?php 
        echo '<p>Products</p>';

        $products = array('Tires', 'Oil', 'Spark Plugs');

        echo '<p>Product 0: '.$products[0].'</p>';

        // sorting
        sort($products);  // ascending
        rsort($products); // descending

        // for loop
        echo '<ul>';
        for($ctr = 0; $ctr < count($products); $ctr++) {
            echo '<li>'.$products[$ctr].'</li>';
        }
        echo '</ul>';

        // for each
        echo '<ul>';
        foreach($products as $product) {
            echo '<li>'.$product.'</li>';
        }
        echo '</ul>';

        // range(start, max, step)
        $numbers = range(1, 10, 0.8);
        echo '<br/>range (1, 10, 0.8):';
        foreach($numbers as $number) {
            echo ' '.$number;
        }

        $letters = range('a', 'z');
        echo '<br/>range (\'a\', \'z\'):';
        foreach($letters as $letter) {
            echo ' '.$letter;
        }

        // -----------------------------------

        // prices
        $prices = array('Tires' => 100, 'Oil' => 50, 'Spark Plugs' => 30,);

        // sort by key
        ksort($prices);  // ascending
        krsort($prices); // descending
        // sort by value
        asort($prices);  // ascending
        arsort($prices); // descending

        $prices['Tires'] = 120;	// assign new value
        echo '<br/>Tire price: '.$prices['Tires'];
        echo '<br/>Oil price: '.$prices['Oil'];
        echo '<br/>Spark Plugs price: '.$prices['Spark Plugs'];

        $prices['Clutch Disk'] = 250; // add an element: arrays in php dont have limits unlike conventional arrays

        echo '<ul>';
        foreach($prices as $itemDesc => $price) { // foreach the key-value array
            echo '<li>'.$itemDesc.' - '.$price.'</li>';
        }
        echo '</ul>';

        // empty array
        $empty = array();

        // -----------------------------------

        $items = array(
            array('Code' => 'TIR', 'Description' => 'Tires', 'Price' => 100),
            array('Code' => 'OIL', 'Description' => 'Oil', 'Price' => 50),
            array('Code' => 'SPK', 'Description' => 'Spark Plugs', 'Price' => 30)
        );

        // custom sorting function (ascending)
        function compareItems($first, $second) {
            if($first['Price'] == $second['Price']) {
                return 0;
            } else if($first['Price'] > $second['Price']) {
                return 1;
            } else {
                return -1;
            }
        }

        // method called to utilize custom sorting functions
        usort($items, 'compareItems');

        echo '<table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th><Description</th>
                        <th>Price</th>
                    </tr>

                </thead>';

        foreach($items as $item) {
            echo '<tr>';
            foreach($item as $field => $value) {
                echo '<td>'.$value.'</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
     ?>	

<?php
    require_once('view/footer.php')
?>