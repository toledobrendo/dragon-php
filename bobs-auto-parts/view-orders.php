<?php
    require_once 'view-comp/header.php';
    require_once 'service/save-order.php';
    require_once 'exception/file-not-found-exception.php';
?>
    <h3 class="card-title">Order Summary</h3>
        <?php
            readOrder();
        ?>
<?php
    require_once 'view-comp/footer.php';
?>