<?php
function isActive($page) {
  return strpos($_SERVER['REQUEST_URI'], $page);
}
?>
<html>
<title>finals-ecommerce: index </title>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet"
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
  crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/header-design.css">
</head>
<body>
  <!-- hello-world.php or hello_world.php -->
  <div class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div href="index.php" class="navbar-brand">BRAND NAME</div>

    <div class="navbar-nav">
      <div class="navbar-content">
        <div>
          <button class="btn btn-primary" data-toggle="modal" data-target="#registerModal"> Register </button>
        </div>
      </div>
    </div>
  </div>

<?php require_once('scripts/register.php'); ?>

    <div class="container">
      <div class="card my-3">
