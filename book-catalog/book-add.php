<?php
//No DB Problems and POST contains data
if (!empty($_POST)) {
  //MySQL Connection details, preferablly in a separate php file with correct permissions
  $DB_URL = "localhost"; //Locally on my PC
  $DB_PORT = "3306"; //Default port is 3306, just for flexibility add option for port
  $DB_NAME = "myuser_webprog"; // Database name or what DB to use
  $DB_USERNAME = "myuser"; //DB user
  $DB_PASSWORD = "is9kSG6eFG#B3EG9"; //DB user's pass
  @$database = new mysqli($DB_URL, $DB_USERNAME, $DB_PASSWORD, $DB_NAME, $DB_PORT); //Surpress warning incase server goes down and use the $Db->connect_error function
  if (!$database->connect_error) {
    /*
      Match author name in the database then link it with the new book entry.
      If author does not exist, create automatically.
    */
    $authorResult = $database->query("SELECT author.id FROM author WHERE name LIKE '%" . $_POST['bookAuthor'] . "%'");
    $insertNewBookQuery = "INSERT INTO book(title,isbn,author_id,img_link) VALUES (?,?,(SELECT id FROM author WHERE name LIKE '%".$_POST['bookAuthor']."%'),?)";
    //Assume row is unique since the PDF didn't state anything about duplicates
    if ($authorResult->num_rows > 0) {
      $authorResult = $authorResult->fetch_assoc(); //Get the associated array of the result set
      $authorResult = $authorResult['id']; //Get the Author ID from the array
      //Now we have the author id, time to inner join insert
      $insertNewBook = $database->prepare($insertNewBookQuery);
      $insertNewBook->bind_param("sss",$bookTitle,$bookIsbnCode,$bookImgUrl);
      $bookTitle = $_POST['bookTitle'];
      $bookIsbnCode = $_POST['bookIsbnCode'];
      $bookImgUrl = $_POST['bookImgUrl'];
      $isSuccessfulInsert = $insertNewBook->execute();
      $insertNewBook->close();
      $database->close();
    } else { //Author does not exist since query returned 0 rows
      //Author
      $insertNewAuthor = $database->prepare("INSERT INTO author(name) VALUES (?)");
      $insertNewAuthor->bind_param("s", $authorName);
      $authorName = $_POST['bookAuthor'];
      $insertNewAuthor->execute();
      $insertNewAuthor->close();
      //Book
      $insertNewBook = $database->prepare($insertNewBookQuery);
      $insertNewBook->bind_param('sss',$bookTitle,$bookIsbnCode,$bookImgUrl);
      $bookTitle = $_POST['bookTitle'];
      $bookIsbnCode = $_POST['bookIsbnCode'];
      $bookImgUrl = $_POST['bookImgUrl'];
      $isSuccessfulInsert = $insertNewBook->execute();
      $insertNewBook->close();
      $database->close();
    }
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>Add Book</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <!-- Nav -->
  <?php include "templates/menu.php" ?>
  <!-- Body -->
  <div class="container">
    <?php
    /* SERVER CONNECTION FAILS */
    //Surpress warning if DB is not present due to POST being empty
    if (@$database->connect_error) {
      /*
                    Windows newline: \r\n
                    UNIX/Linux Based: \n
                    Also kill the php script if DB fails
                  */
      echo 'Something went wrong my dude.<br>';
      die("Could not connect to DB!" . '<br>' . $database->connect_error);
    }
    //If isSuccessfulInsert not null
    if(isset($isSuccessfulInsert)){
      if($isSuccessfulInsert){
        echo '<h3>Book was added.</h3>';
      } else {
        echo '<h3>Could not add book.</h3>';
      }
    }
    ?>
    <div class="card">
      <div class="card-header">
        <h6>Add Book</h6>
      </div>
      <div class="card-body">
        <form action="" method="POST">
          <div class="form-group">
            <label for="bookTitle">Book Title</label>
            <input class="form-control" type="text" name="bookTitle" id="bookTitle" required>
          </div>
          <div class="form-group">
            <label for="bookAuthor">Author Name</label>
            <input class="form-control" type="text" name="bookAuthor" id="bookAuthor" required>
          </div>
          <div class="form-group">
            <label for="bookIsbnCode">ISBN</label>
            <input class="form-control" type="text" name="bookIsbnCode" id="bookIsbnCode" required>
          </div>
          <div class="form-group">
            <label for="bookImgUrl">Image URL</label>
            <input class="form-control" type="text" name="bookImgUrl" id="bookImgUrl" required>
          </div>
          <div>
            <button class="btn btn-primary" type="submit">Submit</button>
          </div>
        </form>
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