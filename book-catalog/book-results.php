<?php
//MySQL Connection details, preferablly in a separate php file with correct permissions
$DB_URL = "localhost"; //Locally on my PC
$DB_PORT = "3306"; //Default port is 3306, just for flexibility add option for port
$DB_NAME = "myuser_webprog"; // Database name or what DB to use
$DB_USERNAME = "myuser"; //DB user
$DB_PASSWORD = "is9kSG6eFG#B3EG9"; //DB user's pass
define('COLUMNS', array(
  'author' => 'author.name',
  'title' => 'book.title',
  'isbn' => 'book.isbn'
));

//STORE DATA FROM FORM
$searchTerm = $_POST["searchTerm"];
$searchType = $_POST["searchType"];
@$database = new mysqli($DB_URL, $DB_USERNAME, $DB_PASSWORD, $DB_NAME, $DB_PORT); //Surpress warning incase server goes down and use the $Db->connect_error function

//Do things if DB has no issue, else proceed to die in card body
if (!$database->connect_error) {
  $queryBooksStatement = "SELECT author.name AS author_name, book.title, book.isbn, book.img_link FROM book INNER JOIN author ON author.id = book.author_id WHERE " . COLUMNS[$searchType] . " LIKE '%" . $searchTerm . "%'";
  $queryBookResults = $database->query($queryBooksStatement);
  $database->close();
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>Results</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h6>Book Results</h6>
      </div>
      <div class="card-body">
        <?php
        /* SERVER CONNECTION FAILS */
        if ($database->connect_error) {
          /*
                      Windows newline: \r\n
                      UNIX/Linux Based: \n
                      Also kill the php script if DB fails
                    */
          echo 'Something went wrong my dude.<br>';
          die("Could not connect to DB!" . '<br>' . $database->connect_error);
        }
        /* SERVER CONNECTION WORKS */
        //Result has DATA
        echo '<p>Results for ' . $searchType . ' : ' . $searchTerm . '</p>';
        echo '<p>Number of books found: ' . $queryBookResults->num_rows;
        /** Print Results */
        while ($row = $queryBookResults->fetch_assoc()) {
          echo '<div class="card w-50"><div class="card-body">';
          echo '<div class="row">';
          echo '<div class="col-4">';
          echo "<img class='img-fluid' src=\"". $row['img_link'] ."\">";
          echo '</div>';
          echo '<div class="col-8">';
          echo '<p><b>' . $row['title'] . '</b></p>';
          echo '<p>By '.$row['author_name'].'</p>';
          echo '<p>'.$row['isbn'].'</p>';
          echo '</div>';
          echo '</div>';
          echo '</div></div>'; // CLosing Tags
        }
        ?>
      </div>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>