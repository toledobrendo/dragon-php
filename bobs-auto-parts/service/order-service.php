<?php
  define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);

  function saveOrder($tireQty, $oilQty, $sparkQty, $totalAmount) {
    echo '<br/>'.DOCUMENT_ROOT;

    $date = date('H:i, jS F Y');

    $outputString = $date."\t".$tireQty." tires\t".$oilQty." oil\t".$sparkQty." spark plugs\t".'$'.$totalAmount."\n";

    $file = @ fopen(DOCUMENT_ROOT.'/dragon-php/bobs-auto-parts/resource/orders.txt', 'ab');

    if (!$file) {
      echo "<p><strong>Your order could not be processed at this time. Please try again later.</strong></p>";
    } else {
      flock($file, LOCK_EX);
      fwrite($file, $outputString, strlen($outputString));
      fwrite($file, $outputString, strlen($outputString));
      flock($file, LOCK_UN);

      fclose($file);
    }
  }

  function getOrders() {
    $file = @ fopen(DOCUMENT_ROOT.'/dragon-php/bobs-auto-parts/resource/orders.txt', 'ab');

    if (!$file) {
      echo "<p><strong>No orders pending. Please try again later.</strong></p>";
    } else {
      while (!feof($file)) {
        $order = fgets($file, 999);
      };

      fclose($file);
    }
  }
?>
