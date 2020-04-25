<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Price List</title>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Price List</h1>
                <?php
                //array declaration in php
                $products = array('Tires', 'Oil', 'Spark Plugs');

                //array with key-value pair
                $prices = array('Tires' => 100, 'Oil' => 10, 'Spark Plugs' => 4);

                //multidimensional array
                $items = array(
                    array('Code' => 'OIL', 'Description' => 'Oil', 'Price' => 10),
                    array('Code' => 'TIR', 'Description' => 'Tires', 'Price' => 100),
                    array('Code' => 'SPK', 'Description' => 'Spark Plugs', 'Price' => 5)
                );

                $numbers = range(1, 10);

                echo 'Numbers: ';
                foreach ($numbers as $number) {
                    echo $number . ' ';
                }

                $letters = range('a', 'z');
                echo 'Letters: ';
                foreach ($letters as $letter) {
                    echo $letter . ' ';
                }

                echo '<br/>';

                echo '<p>Products</p>';
                for ($i = 0; $i < count($products); $i++) {
                    echo '<li>Product ' . $i . ':    ' . $products[$i] . '</li>';
                }

                echo '<br/>';
                $prices['Tires'] = 120;

                echo 'Tire price: ' . $prices['Tires'];
                $prices['Clutch Disk'] = 250;

                echo '<br/>Clutch Disk: ' . $prices['Clutch Disk'];
                echo '<ul>';

                foreach ($prices as $itemDesc => $price) {
                    echo '<li>' . $itemDesc . ' - ' . $price . '</li>';
                }
                echo '</ul>';

                //an empty array
                $empty = array();

                echo '<br/>Oil has a price of $' . $prices['Oil'] . '<br/>';
                echo '<br/>Foreach Loop: ';

                //sort product array
                sort($products);

                //reverse sort
                //rsort($items)

                //foreach -> arrayName as foreachVar
                foreach ($products as &$product) {
                    $product .= '-1';
                    echo '<li>' . $product . '</li>';
                }

                //ksort($prices);// sort by key
                asort($prices); // sort by value
                echo '<br/>Item - Price:';
                foreach ($prices as $itemDesc => $price) {
                    echo '<li>' . $itemDesc . ' - ' . $price . '</li>';
                }

                //access multidimensional array like this
                echo '<br/><p>Accessing Multidimensional Array</p>';
                echo '<p>Item 2 Description: ' . $items[1]['Description'] . '</p>';
                echo '<p>Item 1 Price: ' . $items[0]['Price'] . '</p>';
                echo '<p>Item 3 Code: ' . $items[2]['Code'] . '</p>';

                //call function here to compare prices - usort can be used to utilize custom sorting
                usort(($items), 'compareItems');

                echo '<table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                </tr>
                            </thead>';

                //foreach multidimensional array
                foreach ($items as $item) {
                    echo '<tr>';
                    foreach ($item as $field => $value) {
                        echo '<td>' . $value . '</td>';
                    }
                    echo '</tr>';
                }

                echo  '</table>';

                //custom sorting function
                function compareItems($fir, $sec)
                {
                    if ($fir['Price'] == $sec['Price']) {
                        return 0;
                    } else if ($fir['Price'] > $sec['Price']) {
                        return 1;
                    } else {
                        return -1;
                    }
                }

                ?>
            </div>
            <div class="card-footer">
                <a class="btn btn-info" href="../index.php">Go Back</a>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>