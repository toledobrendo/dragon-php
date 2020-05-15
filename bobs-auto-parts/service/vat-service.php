<?php
  require_once 'exception/file-not-found-exception.php';
  require_once 'exception/property-not-found-exception.php';

  if(!defined('DOCUMENT_ROOT')) {
    define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);
  }

  function getVAT() {

    $file = @ fopen(DOCUMENT_ROOT.'/dragon-php/bobs-auto-parts/resource/properties.txt', 'rb');

    if(!$file) {
      throw new FileNotFoundException('No orders pending. Please try again later');
    } else {
      $data = "";
      $propertyExists = false;
      while (!feof($file)) {
        $data = fgets($file, 999);
        if(strpos($data, 'VAT_PERCENT') !== false) {
          $propertyExists = true;
          break;
        }
      }

      fclose($file);

      if($propertyExists) {
        $vatPercent = doubleval(substr($data,strpos($data,"=") + 1));
        return $vatPercent;
      } else {
        throw new PropertyNotFoundException('VAT_PERCENT property not found. Please set.');
      }
    }
  }
?>
