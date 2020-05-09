<?php
  class FileNotFoundException extends Exception {
    function __toString() {
      return '<p><strong>'.$this->getMessage().'</strong></p>';
    }
  }
?>
