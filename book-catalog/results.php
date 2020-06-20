<?php
require_once './view-comp/header.php';

$searchType = $_POST['searchType'];
$searchTerm = $_POST['searchTerm'];

if(!$searchType || !$searchTerm) {
  echo 'You have not entered search details. Please go back and try again';
} else {
?>
        <div class="card-body">
          <?php
            echo 'Hello World';
          ?>
        </div>
<?php
}

require_once './view-comp/footer.php'; ?>
