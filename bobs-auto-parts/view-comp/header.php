<?php
    require_once 'service/tracker-service.php';
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Bob's Auto Parts</title>
</head>

<body>
    <div class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div href="../../index.php" class="navbar-brand">Bob's Auto Parts</div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item <?php if (isActive('order-form.php')) echo 'active'; ?>">
                    <a href="order-form.php" class="nav-link">Order Form</a>
                </li>
                <li class="nav-item <?php if (isActive('freight-cost.php')) echo 'active'; ?>">
                    <a href="freight-cost.php" class="nav-link">Freight Cost</a>
                </li>
                <li class="nav-item <?php if (isActive('price-list.php')) echo 'active'; ?>">
                    <a href="price-list.php" class="nav-link">Price List</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-body">