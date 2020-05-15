<?php
  class PropertyNotFoundException extends Exception {
    function __toString() {
      return '<p><strong>'.$this->getMessage().'</strong></p>';
    }
  }
?>
