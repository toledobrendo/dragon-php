<?php
  define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);

  function saveOrder() {
    echo '<br/>'.DOCUMENT_ROOT;

    $file = @ fopen(DOCUMENT_ROOT.'/dragon/dragon-php/bobs-auto-parts/resource/order.txt', 'ab');

    if(!$file){
      echo '<p><strong>Your order could not be processed at this time. Please try again later. </strong></p>';
    } else {
      $output = 'hello maniga';
      fwrite($file, $output, strlen($output));
      fwrite($file, $output, strlen($output));
      fwrite($file, $output, strlen($output));
      fwrite($file, $output, strlen($output));
    }
    fclose($file);
  }
 ?>
