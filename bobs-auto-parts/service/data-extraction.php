<?php
  function getValueFromFile($destination, $key) {
    $file = fopen($destination, 'rb');
    while(!feof($file)) {
      $line = fgets($file, 999);
      if(strpos($line, $key) !== false) {
          $splitLine = explode('=', $line, 2);
          $value = $splitLine[1]; // assuming that after = is always the value
          $value = trim($value);
          
          fclose($file);
          return $value;
      }
    };
    fclose($file);
    return 0;
  }
 ?>
