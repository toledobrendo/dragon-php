<?php
require_once('exception/file-not-found-exception.php');

function getVatPercent()
{
  $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
  @ $file = fopen("$DOCUMENT_ROOT/webprog/h4_vat_percent/resource/properties.txt",'rb');
  $properties = fgets($file,999);
  fclose($file);

  $vat_percent = str_replace('VAT_PERCENT=','',$properties);
  return (float)$vat_percent;
}

function getVatableAmount($totalAmount)
{
  $vatableAmount = $totalAmount /(getVatPercent() + 1);
  return $vatableAmount;
}

function getVat($totalAmount)
{
  $vatAmount = $totalAmount - getVatableAmount($totalAmount);
  return $vatAmount;
}


?>
