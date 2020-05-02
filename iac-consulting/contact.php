<?php
    //include('message.php'); //kahit di nageexist file, tutuloy pa rin si lagyan ng @
    //    require('message.php'); //di gagana if di nageexist yung file, kahit i-suppress warning, di pa rin magpapakita yung page
    //    require_once('message.php'); //iisang beses lang iimport yung script
    
    require_once('message.php'); 
    require_once('script.php'); 
    require_once('view-comp/header.php')
?>

  We are located at Yakal St., Makati City

<?php
  require_once('view-comp/footer.php');
?>