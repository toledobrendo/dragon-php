<?php require_once 'view-comp/header.php'; ?>

<h1>Price List</h1>
<?php
  $items = array(
                  array('Code' => 'OIL', 'Description' => 'Oil', 'Price' => 10),
                  array('Code' => 'TIR', 'Description' => 'Tires', 'Price' => 150),
                  array('Code' => 'SPK', 'Description' => 'Spark Plugs', 'Price' => 5)
                );
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
    foreach ($item as $value) {
      echo '<td>'.$value.'</td>';
    }
    echo '</tr>';
  }
  echo '</table>';
?>

<?php require_once 'view-comp/footer.php' ?>
