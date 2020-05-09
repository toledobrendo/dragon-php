<?php
  @include('../exception/file-not-found.php');
  @include('exception/file-not-found.php');
  define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);

  function saveOrder($list) {
    echo '<br/>'.DOCUMENT_ROOT;

    $productList = $list;
    $file = @ fopen(DOCUMENT_ROOT.'/dragon/dragon-php/bobs-auto-parts/resource/order.txt', 'ab');

    if(!$file){
      echo '<p><strong>Your order could not be processed at this time. Please try again later. </strong></p>';
    } else {

      flock($file, LOCK_EX); //locks
      //gonna put the date
      $date = date('H:i jS F Y');
      fwrite($file, $date, strlen($date));
      fwrite($file, "----------\n", 50);
      //then list all of the products one by one
      foreach ($productList->products as $item) {
        $line = '>> '.$item->quantity."\t\t".$item->productName."\t\t@ ".$item->productPrice." Php each"."\n";
        fwrite($file, $line, strlen($line));
      }

      flock($file, LOCK_UN); //unlocks
    }
    fclose($file);
  }

  function echoOrders(){
    $file = @ fopen(DOCUMENT_ROOT.'/dragon/dragon-php/bobs-auto-parts/resource/order.txt', 'rb');

    try {
      if(!$file) {
        throw new FileNotFoundException('No orders pending.');
      } else {
        while(!feof($file)) {
          $line = fgets($file, 999);
          echo $line.'<br>';
        };
      }
    } catch (FileNotFoundException $e) {
      echo $e->getMessage();
    }
    fclose($file);
  }
 ?>
