<html>
<head>
  <title>Iac Consulting</title>
</head>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<body>
  <div class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div href="index.php" class="navbar-brand"> iAc Consulting </div>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav">
        <li class="nav-item active" <?php if(strpos($_SERVER['REQUEST_URI'], 'index.php')) echo 'active'; ?>>
          <a class="nav-link" href="index.php"> Home </a>
        </li>
        <li class="nav-item"  <?php if(strpos($_SERVER['REQUEST_URI'], 'contact-us.php')) echo 'active'; ?>>
          <a class="nav-link" href="contact-us.php"> Contact Us </a>
        </li>
      </ul>
    </div>
  </div>

  <div class="container">
    <div class="card">
      <div class="card-body">
