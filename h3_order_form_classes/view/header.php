<?php
  function isActive($page)
  {
    return strpos($_SERVER['REQUEST_URI'], $page);
  }
 ?>
<html>
<head>
  <title>Bob's Auto Part Dealer</title>
</head>
<?php
  require_once 'view/bootstrap.php';
?>
<body>
  <div class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div href="index.php" class="navbar-brand"> Bob's Auto Part Dealer </div>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav">
        <li class="nav-item <?php if(isActive('index.php')) echo 'active'; ?>">
          <a class = "nav-link" href="index.php"> Home </a>
        </li>
        <li class="nav-item <?php if(isActive('contact-us.php')) echo 'active'; ?>">
          <a class = "nav-link" href="contact-us.php"> Contact Us </a>
        </li>
      </ul>
    </div>
  </div>

  <div class="container">
    <div class="card">
      <div class="card-body">
